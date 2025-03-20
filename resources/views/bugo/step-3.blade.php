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

          <input type="hidden" name="step" value="3">

          <div>
            <x-text-input id="deadline" class="block w-full" type="date" name="deadline" required
              placeholder="Deadline" :value="old('deadline', $state['deadline'])" />
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
          </div>

          <div>
            <div class="p-6 bg-white border-gray-300 input-shadow text-zinc-900 rounded-3xl">
              <span class="block w-full mb-4 text-center">Preferred Saving Risk Level</span>

              <div class="flex flex-col items-start gap-4">
                <label for="risk_level">
                  <input class="mr-2 form-radio:size-5" type="radio" name="risk_level" value="low" required>
                  <span>Conservative (Low Risk) - Safe & stable savings, minimal risk.</span>
                </label>
                <label for="risk_level">
                  <input class="mr-2 form-radio:size-5" type="radio" name="risk_level" value="medium" required>
                  <span>Moderate (Medium Risk) - Balanced approach, mix of savings & investments.</span>
                </label>
                <label for="risk_level">
                  <input class="mr-2 form-radio:size-5" type="radio" name="risk_level" value="high" required>
                  <span>Aggressive (High Risk) - High-growth potential, higher risk involved.</span>
                </label>
              </div>
            </div>

            <x-input-error :messages="$errors->get('risk_level')" class="mt-2" />
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
