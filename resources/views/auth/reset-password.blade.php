<x-guest-layout>
  <form method="POST" action="{{ route('password.store') }}" class="grid gap-6 text-center">
    @csrf

    <h1 class="text-3xl font-semibold uppercase lg:text-zinc-900">
      Reset Password
    </h1>

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div>
      <x-text-input id="email" class="block w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus
        autocomplete="username" placeholder="email" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
      <x-text-input id="password" class="block w-full" type="password" name="password" required
        autocomplete="new-password" placeholder="password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div>
      <x-text-input id="password_confirmation" class="block w-full" type="password" name="password_confirmation"
        required autocomplete="new-password" placeholder="confirm password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-center">
      <x-button class="input-shadow">
        {{ __('Reset Password') }}
      </x-button>
    </div>
  </form>
</x-guest-layout>
