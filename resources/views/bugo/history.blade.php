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
      <div class="grid gap-6 text-center">
        <h1 class="z-50 text-3xl font-bold text-center">
          Calculation History
        </h1>

        <div class="relative py-16 splide" role="group" aria-label="Splide Basic HTML Example">
          <div class="absolute w-5/6 h-full border position-center rounded-2xl border-zinc-200 bg-zinc-100"></div>
          <div class="absolute h-full position-center splide__arrows"></div>

          <div class="splide__track">
            <ul class="splide__list">
              @foreach ($calculations as $calculation)
                @php
                  $mapper = [
                      'low' => 'Conservative',
                      'medium' => 'Moderate',
                      'high' => 'Aggressive',
                  ];

                  $summary = $calculation->summary();
                  $debt_fund_per_month = $summary['debt_fund_per_month'];
                  $total_saving_per_month = $summary['total_saving_per_month'];
                  $emergency_fund_per_month = $summary['emergency_fund_per_month'];
                @endphp

                <div
                  class="flex flex-col items-center bg-white border lg:flex-row splide__slide border-zinc-200 rounded-2xl">
                  <div class="flex flex-col gap-2 p-10 lg:border-r basis-1/2 text-start border-zinc-200">
                    <h2 class="text-2xl font-semibold uppercase text-darker">{{ $calculation['target_name'] }}</h2>
                    <span class="text-2xl font-semibold">Rp{{ number_format($calculation['target_amount'], 2) }}</span>

                    <h3 class="text-lg font-semibold text-darker">
                      <span>{{ $mapper[$calculation['risk_level']] }}</span>
                      <span>Saving Plan</span>
                    </h3>

                    <span class="text-2xl font-semibold">
                      Rp{{ number_format($total_saving_per_month, 2) }} / Month
                    </span>

                    <span>Or</span>

                    <span class="text-2xl font-semibold">
                      Rp{{ number_format($total_saving_per_month * 12, 2) }} / Year
                    </span>
                  </div>

                  <div class="flex flex-col gap-2 p-10 basis-1/2 text-start">
                    <h3 class="text-lg font-semibold text-darker">Emergency Fund</h3>

                    <span class="text-2xl font-semibold">
                      Rp{{ number_format($emergency_fund_per_month, 2) }} / Month
                    </span>

                    <span>Or</span>

                    <span class="text-2xl font-semibold">
                      Rp{{ number_format($emergency_fund_per_month * 12, 2) }} / Year
                    </span>
                  </div>
                </div>
              @endforeach
            </ul>
          </div>
        </div>

        <a href="{{ route('bugo.reset') }}">
          <x-button type="button">{{ __('Start Over!') }}</x-button>
        </a>
      </div>

    </main>

    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>

</x-landing-layout>
