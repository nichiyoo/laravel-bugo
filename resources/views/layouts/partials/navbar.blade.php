<nav class="flex items-center justify-between w-full py-6">
  <a href="{{ route('home') }}" class="flex-none">
    <img src="{{ asset('logo.png') }}" class="w-auto h-12" alt="{{ config('app.name') }}">
  </a>

  <ul class="flex items-center gap-6 font-medium uppercase underline-offset-4">
    <li>
      <a href="{{ route('home') }}"
        class="hover:underline whitespace-nowrap @if (request()->routeIs('home')) underline @endif">
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('about') }}"
        class="hover:underline whitespace-nowrap @if (request()->routeIs('about')) underline @endif">
        About
      </a>
    </li>
    <li>
      <a href="{{ route('bugo.index') }}"
        class="hover:underline whitespace-nowrap @if (request()->routeIs('bugo.*')) underline @endif">
        My Bugo
      </a>
    </li>

    @auth
      <li>
        <a href="{{ route('profile') }}"
          class="hover:underline whitespace-nowrap @if (request()->routeIs('bugo')) underline @endif">
          <span class="flex items-center gap-2">
            <i data-lucide="user-circle" class="size-5"></i>
            <span class="hidden lg:block">Profile</span>
          </span>
        </a>
      </li>
    @else
      <li>
        <a href="{{ route('login') }}"
          class="hover:underline whitespace-nowrap @if (request()->routeIs('bugo')) underline @endif">
          <span class="flex items-center gap-2">
            <i data-lucide="user-circle" class="size-5"></i>
            <span class="hidden lg:block">Login</span>
          </span>
        </a>
      </li>
    @endauth
  </ul>
</nav>
