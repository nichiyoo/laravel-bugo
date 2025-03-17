<x-guest-layout>
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <form method="POST" action="{{ route('login') }}" class="grid gap-6 text-center">
    @csrf
    <h1 class="text-3xl font-semibold uppercase lg:text-zinc-900">
      Login
    </h1>

    <div>
      <x-text-input id="email" class="block w-full" placeholder="email" type="email" name="email" :value="old('email')"
        required autofocus autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
      <x-text-input id="password" class="block w-full" placeholder="password" type="password" name="password" required
        autocomplete="current-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="flex items-center justify-center">
      <x-button class="input-shadow">
        {{ __('Log in') }}
      </x-button>
    </div>

    <span class="text-xl font-semibold lg:text-zinc-900">
      <span>Don&apos;t have an account, Bud?</span>
      <a href="{{ route('register') }}" class="text-blue-500">
        <span>Register</span>
      </a>
    </span>
  </form>
</x-guest-layout>
