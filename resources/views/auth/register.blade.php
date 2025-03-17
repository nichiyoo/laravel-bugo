<x-guest-layout>
  <form method="POST" action="{{ route('register') }}" class="grid gap-6 text-center">
    @csrf
    <h1 class="text-3xl font-semibold uppercase lg:text-zinc-900">
      Register
    </h1>

    <div>
      <x-text-input id="name" class="block w-full" placeholder="name" type="text" name="name" :value="old('name')"
        required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
      <x-text-input id="email" class="block w-full" placeholder="email" type="email" name="email"
        :value="old('email')" required autocomplete="username" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div>
      <x-text-input id="password" class="block w-full" placeholder="password" type="password" name="password" required
        autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div>
      <x-text-input id="password_confirmation" class="block w-full" placeholder="confirm password" type="password"
        name="password_confirmation" required autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-center">
      <x-button class="input-shadow">
        {{ __('Register') }}
      </x-button>
    </div>

    <span class="text-xl font-semibold lg:text-zinc-900">
      <span>Already have an account, Bud?</span>
      <a href="{{ route('login') }}" class="text-blue-500">
        <span>Login</span>
      </a>
    </span>
  </form>
</x-guest-layout>
