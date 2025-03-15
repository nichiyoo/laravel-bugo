<nav class="flex items-center justify-between w-full py-6">
  <a href="{{ route('home') }}">
    <img src="{{ asset('logo.png') }}" class="w-auto h-12" alt="{{ config('app.name') }}">
  </a>

  <ul class="flex items-center gap-6 font-medium uppercase underline-offset-4">
    <li>
      <a href="{{ route('home') }}" class="hover:underline @if (request()->routeIs('home')) underline @endif">
        Home
      </a>
    </li>
    <li>
      <a href="{{ route('about') }}" class="hover:underline @if (request()->routeIs('about')) underline @endif">
        About
      </a>
    </li>
    <li>
      <a href="{{ route('bugo') }}" class="hover:underline @if (request()->routeIs('bugo')) underline @endif">
        My Bugo
      </a>
    </li>
    <li>
      <a href="{{ route('start') }}" class="hover:underline @if (request()->routeIs('start')) underline @endif">
        Get Started
      </a>
    </li>
  </ul>
</nav>
