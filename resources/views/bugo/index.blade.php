<x-landing-layout>

  <body class="h-screen overflow-x-hidden font-sans text-white bg-pattern">
    <svg class="absolute bottom-0 right-0" width="585" height="744" viewBox="0 0 585 744" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M708.156 720.971C696.423 848.563 782.326 950.34 597.263 933.321C412.201 916.303 -9.79541 1031.69 1.93792 904.098C-27.1368 422.885 548.118 577.212 587.136 0.361182C898.821 29.0234 652.217 586.701 708.156 720.971Z"
        fill="#BCFDF7" />
    </svg>

    <div class="absolute top-0 z-10 w-full">
      <div class="container max-w-7xl">
        @include('layouts.partials.navbar')
      </div>
    </div>

    <main class="container relative grid items-center h-screen gap-10 max-w-7xl">
      <div>
        <div class="flex flex-col items-center gap-6 text-center">
          <h1 class="text-6xl font-bold text-shadow">Welcome To My BUGO!</h1>
          <span class="text-xl">Where you meet your true buddy to your goals.</span>

          <p>
            Here, I&apos;ll give you options and recommendations based on the data you&apos;re about to input. Remember
            to put your data correctly. Every data you&apos;ve shared is safe with me.
            <br />
            <br />
            Are you ready?
          </p>

          <a href="{{ route('bugo.start') }}">
            <x-button>{{ __("I'm Ready!") }}</x-button>
          </a>
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
