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
            Tell me your goal bud!
          </h1>

          <input type="hidden" name="step" value="1">

          <div>
            <x-text-input id="target_name" class="block w-full" type="text" name="target_name"
              placeholder="Target Name (Car, House, Etc)" :value="old('target_name', $state['target_name'])" required />
            <x-input-error :messages="$errors->get('target_name')" class="mt-2" />
          </div>

          <div>
            <x-text-input id="target_amount" class="block w-full" type="number" name="target_amount"
              placeholder="target amount" :value="old('target_amount', $state['target_amount'])" required />
            <x-input-error :messages="$errors->get('target_amount')" class="mt-2" />
          </div>

          <div class="flex items-center justify-center gap-2">
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
