<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
  /** @use HasFactory<\Database\Factories\CalculationFactory> */
  use HasFactory;

  protected $percentages = [
    'low' => 0.7,
    'medium' => 0.8,
    'high' => 0.9,
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var list<string>
   */
  protected $fillable = [
    'user_id',
    'target_name',
    'target_amount',
    'monthly_income',
    'personal_monthly_expenses',
    'dependents_cost',
    'monthly_emergency_fund_goal',
    'monthly_debt',
    'deadline',
    'risk_level',
  ];

  /**
   * Get the user that owns the calculation.
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get calculation summary
   */
  public function summary()
  {
    $deducted_income = $this->monthly_income - ($this->personal_monthly_expenses + $this->dependents_cost + $this->monthly_emergency_fund_goal + $this->monthly_debt);
    $percentage = $this->percentages[$this->risk_level];
    $total_saving_per_month = min($this->target_amount / 12, $percentage * $deducted_income);
    $emergency_fund_per_month = $total_saving_per_month / 2;
    $debt_fund_per_month = $this->monthly_debt;

    return [
      'total_saving_per_month' => $total_saving_per_month,
      'emergency_fund_per_month' => $emergency_fund_per_month,
      'debt_fund_per_month' => $debt_fund_per_month,
    ];
  }
}
