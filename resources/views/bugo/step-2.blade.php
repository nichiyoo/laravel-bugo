<x-landing-layout>

  <body class="h-screen overflow-x-hidden font-sans bg-secondary">

    <svg class="absolute bottom-0 right-0" width="585" height="744" viewBox="0 0 585 744" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <path class="fill-background"
        d="M708.156 720.971C696.423 848.563 782.326 950.34 597.263 933.321C412.201 916.303 -9.79541 1031.69 1.93792 904.098C-27.1368 422.885 548.118 577.212 587.136 0.361182C898.821 29.0234 652.217 586.701 708.156 720.971Z"
        fill="#BCFDF7" />
    </svg>

    <div class="absolute top-0 z-10 w-full">
      <div class="container max-w-7xl">
        @include('layouts.partials.navbar-dark')
      </div>
    </div>

    <main class="container relative grid items-center h-screen gap-10 max-w-7xl">
      <div>
        <form method="POST" action="{{ route('bugo.next') }}" class="grid gap-6 text-center">
          @csrf

          <h1 class="text-3xl font-bold">
            Let&apos;s find the best saving plan for you!
          </h1>

          <input type="hidden" name="step" value="2">

          <div>
            <x-text-input id="monthly_income" class="block w-full" type="number" name="monthly_income"
              placeholder="Monthly Income" :value="old('monthly_income', $state['monthly_income'])" required />
            <x-input-error :messages="$errors->get('monthly_income')" class="mt-2" />
          </div>

          <div>
            <x-text-input id="personal_monthly_expenses" class="block w-full" type="number"
              name="personal_monthly_expenses" placeholder="Personal Monthly Expenses" :value="old('personal_monthly_expenses', $state['personal_monthly_expenses'])" required />
            <x-input-error :messages="$errors->get('personal_monthly_expenses')" class="mt-2" />
          </div>

          <div>
            <x-text-input id="dependents_cost" class="block w-full" type="number" name="dependents_cost"
              placeholder="Dependents Cost" :value="old('dependents_cost', $state['dependents_cost'])" required />
            <x-input-error :messages="$errors->get('dependents_cost')" class="mt-2" />
          </div>

          <div>
            <x-text-input id="monthly_emergency_fund_goal" class="block w-full" type="number"
              name="monthly_emergency_fund_goal" placeholder="Monthly Emergency Fund Goal" :value="old('monthly_emergency_fund_goal', $state['monthly_emergency_fund_goal'])" required />
            <x-input-error :messages="$errors->get('monthly_emergency_fund_goal')" class="mt-2" />
          </div>

          <div class="mt-4">
            <x-text-input id="monthly_debt" class="block w-full" type="number" name="monthly_debt"
              placeholder="Monthly Debt" :value="old('monthly_debt', $state['monthly_debt'])" required />
            <x-input-error :messages="$errors->get('monthly_debt')" class="mt-2" />
          </div>

          <div class="flex items-center justify-center gap-2">
            <a href="{{ route('bugo.previous') }}">
              <x-button type="button">{{ __('Back') }}</x-button>
            </a>
            <x-button>{{ __('Next') }}</x-button>
          </div>
        </form>
      </div>
    </main>

    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>

</x-landing-layout>
