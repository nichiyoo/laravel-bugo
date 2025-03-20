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
        <div class="grid gap-6 text-center">
          @csrf

          <h1 class="text-3xl font-bold">
            My BUGO Calculation
          </h1>

          @php
            $mapper = [
                'low' => 'Conservative',
                'medium' => 'Moderate',
                'high' => 'Aggressive',
            ];
          @endphp

          <div class="p-6 bg-white border-gray-300 shadow-lg text-zinc-900 rounded-3xl">
            <div class="flex flex-col gap-4">
              <h2 class="text-2xl font-semibold uppercase text-darker">{{ $state['target_name'] }}</h2>
              <span class="text-2xl font-semibold">Rp{{ number_format($state['target_amount'], 2) }}</span>

              <h3 class="text-lg font-semibold text-darker">
                <span>{{ $mapper[$state['risk_level']] }}</span>
                <span>Saving Plan</span>
              </h3>

              <span class="text-2xl font-semibold">Rp{{ number_format($total_saving_per_month, 2) }} / Month</span>
              <span>Or</span>
              <span class="text-2xl font-semibold">Rp{{ number_format($total_saving_per_month * 12, 2) }} / Year</span>

              <hr class="border-zinc-500" />

              <h3 class="text-lg font-semibold text-darker">Emergency Fund</h3>

              <span class="text-2xl font-semibold">Rp{{ number_format($emergency_fund_per_month, 2) }} / Month</span>
              <span>Or</span>
              <span class="text-2xl font-semibold">Rp{{ number_format($emergency_fund_per_month * 12, 2) }} /
                Year</span>
            </div>
          </div>

          <div class="flex items-center justify-center gap-2">
            <a href="{{ route('bugo.previous') }}">
              <x-button type="button">{{ __('Back') }}</x-button>
            </a>

            <a href="{{ route('bugo.reset') }}">
              <x-button type="button">{{ __('Start Over!') }}</x-button>
            </a>

            <form action="{{ route('bugo.save') }}" method="POST">
              @csrf
              <x-button>{{ __('Save Calculation!') }}</x-button>
            </form>

            <a href="{{ route('bugo.history') }}">
              <x-button type="button">{{ __('Saved Calculation Page') }}</x-button>
            </a>
          </div>
        </div>
      </div>
    </main>

    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>

</x-landing-layout>
