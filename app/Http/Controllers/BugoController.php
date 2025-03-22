<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BugoController extends Controller
{
  protected $mapper = [
    1 => 'bugo.step-1',
    2 => 'bugo.step-2',
    3 => 'bugo.step-3',
    4 => 'bugo.finish',
  ];

  protected $default = [
    'step' => 1,
    'target_name' => null,
    'target_amount' => null,
    'monthly_income' => null,
    'personal_monthly_expenses' => null,
    'dependents_cost' => null,
    'monthly_emergency_fund_goal' => null,
    'monthly_debt' => null,
    'deadline' => null,
    'risk_level' => null,
  ];

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('bugo.index');
  }

  /**
   * Start bugo calculator
   */
  public function start(Request $request)
  {
    $state = $request->session()->get('bugo.state', $this->default);
    $step = $state['step'];
    $view = $this->mapper[$step];

    return view($view, [
      'state' => $state,
    ]);
  }

  /**
   * Move to the next step
   */
  public function next(Request $request)
  {
    $step = $request->input('step');
    $state = $request->session()->get('bugo.state', $this->default);

    switch ($step) {
      case '1':
        $currencies = [
          'target_amount'
        ];

        foreach ($currencies as $currency) {
          $request->merge([
            $currency => preg_replace('/[^0-9]/', '', $request->input($currency)),
          ]);
        }

        $request->validate([
          'target_name' => ['required', 'string', 'max:255'],
          'target_amount' => ['required', 'numeric', 'min:1'],
        ]);

        $state['target_name'] = $request->input('target_name');
        $state['target_amount'] = $request->input('target_amount');
        break;

      case '2':
        $currencies = [
          'monthly_income',
          'personal_monthly_expenses',
          'dependents_cost',
          'monthly_emergency_fund_goal',
          'monthly_debt',
        ];

        foreach ($currencies as $currency) {
          $request->merge([
            $currency => preg_replace('/[^0-9]/', '', $request->input($currency)),
          ]);
        }

        $request->validate([
          'monthly_income' => ['required', 'numeric', 'min:1'],
          'personal_monthly_expenses' => ['required', 'numeric'],
          'dependents_cost' => ['required', 'numeric'],
          'monthly_emergency_fund_goal' => ['required', 'numeric'],
          'monthly_debt' => ['required', 'numeric'],
        ]);

        $monthly_income = $request->input('monthly_income');
        $personal_monthly_expenses = $request->input('personal_monthly_expenses');
        $dependents_cost = $request->input('dependents_cost');
        $monthly_emergency_fund_goal = $request->input('monthly_emergency_fund_goal');
        $monthly_debt = $request->input('monthly_debt');
        $total_expenses = $personal_monthly_expenses + $dependents_cost + $monthly_emergency_fund_goal + $monthly_debt;

        if ($monthly_income < $total_expenses) {
          return redirect()->route('bugo.start')->withErrors([
            'monthly_income' => 'Your monthly income must be at least equal to the sum of your personal expenses, dependents cost, emergency fund goal, and debt.'
          ])->withInput();
        }

        $state['monthly_income'] = $monthly_income;
        $state['personal_monthly_expenses'] = $personal_monthly_expenses;
        $state['dependents_cost'] = $dependents_cost;
        $state['monthly_emergency_fund_goal'] = $monthly_emergency_fund_goal;
        $state['monthly_debt'] = $monthly_debt;
        break;

      case '3':
        $request->validate([
          'deadline' => ['required', 'date'],
          'risk_level' => ['required', 'in:low,medium,high'],
        ]);

        $state['deadline'] = $request->input('deadline');
        $state['risk_level'] = $request->input('risk_level');
        break;
    }

    $step = $step + 1;
    $state['step'] = $step;
    $request->session()->put('bugo.state', $state);
    if ($step === 4) return redirect()->route('bugo.finish');

    $view = $this->mapper[$step];
    return view($view, [
      'state' => $state,
    ]);
  }

  /**
   * Move to the previous step
   */
  public function previous(Request $request)
  {
    $state = $request->session()->get('bugo.state', $this->default);
    $step = $state['step'];

    $step = max(1, $step - 1);
    $state['step'] = $step;
    $request->session()->put('bugo.state', $state);
    $view = $this->mapper[$step];

    return view($view, [
      'state' => $state,
    ]);
  }

  /**
   * Finish bugo calculator
   */
  public function finish(Request $request)
  {
    $state = $request->session()->get('bugo.state', $this->default);
    $step = $state['step'];

    if ($step < 4 || $step > 5) return redirect()->route('bugo.start');

    $percentages = [
      'low' => 0.7,
      'medium' => 0.8,
      'high' => 0.9,
    ];

    $percentage = $percentages[$state['risk_level']];
    $monthly_income = $state['monthly_income'];
    $personal_monthly_expenses = $state['personal_monthly_expenses'];
    $dependents_cost = $state['dependents_cost'];
    $monthly_emergency_fund_goal = $state['monthly_emergency_fund_goal'];
    $monthly_debt = $state['monthly_debt'];

    $deducted_income = $monthly_income - ($personal_monthly_expenses + $dependents_cost + $monthly_emergency_fund_goal + $monthly_debt);
    $total_saving_per_month = min($state['target_amount'] / 12, $percentage * $deducted_income);
    $emergency_fund_per_month = $total_saving_per_month / 2;
    $debt_fund_per_month = $monthly_debt;

    return view('bugo.finish', [
      'state' => $state,
      'total_saving_per_month' => $total_saving_per_month,
      'emergency_fund_per_month' => $emergency_fund_per_month,
      'debt_fund_per_month' => $debt_fund_per_month,
    ]);
  }

  public function reset(Request $request)
  {
    $request->session()->forget('bugo.state');
    return redirect()->route('bugo.start');
  }

  /**
   * Save bugo calculator history
   */
  public function save(Request $request)
  {
    $state = $request->session()->get('bugo.state', $this->default);

    $user = Auth::user();
    $calculation = new Calculation([
      'user_id' => $user->id,
      ...$state,
    ]);
    $calculation->save();
    $request->session()->forget('bugo.state');

    return redirect()->route('bugo.history');
  }

  /**
   * Display bugo calculator history
   */
  public function history()
  {
    $user = Auth::user();
    $calculations = $user->calculations()->get();

    return view('bugo.history', [
      'calculations' => $calculations,
    ]);
  }
}
