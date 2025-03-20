<x-guest-layout>
  <div class="grid gap-6 text-center">
    <span class="text-3xl font-semibold uppercase lg:text-zinc-900">
      {{ Auth::user()->name }}
    </span>

    <span class="text-xl font-semibold lg:text-zinc-900">
      {{ Auth::user()->email }}
    </span>

    <div class="flex items-center justify-center gap-4">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-button class="input-shadow">
          Logout
        </x-button>
      </form>

      <a href={{ route('bugo.history') }}>
        <x-button class="input-shadow">
          Saved Calculation
        </x-button>
      </a>

      @role('admin')
        <a href={{ route('dashboard') }}>
          <x-button class="input-shadow">
            Dashboard
          </x-button>
        </a>
      @endrole
    </div>
  </div>
</x-guest-layout>
