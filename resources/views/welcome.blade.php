<x-landing-layout>

  <body
    class="font-sans text-white bg-gradient-to-t from-background from-80% to-darker relative min-h-screen pb-60 overflow-x-hidden">
    <div class="container grid gap-10 overflow-x-hidden max-w-7xl">
      @include('layouts.partials.navbar')

      <main class="py-20">
        <div class="grid items-center gap-10 lg:grid-cols-3">
          <div class="flex flex-col gap-6 lg:col-span-2">
            <h1 class="text-6xl font-bold text-shadow">Buddy to Your Goals!</h1>
            <span class="text-xl">Your Partner in Achieving Financial Dreams</span>
            <p>
              Your future starts with the right financial steps. At BUGO, we believe that every goal—big or
              small—deserves
              a solid plan. We&apos;re more than just an app; we&apos;re your companion in building better financial
              habits,
              staying
              on track, and turning aspirations into reality.
              With BUGO by your side, planning, saving, and achieving become seamless. Let&apos;s take the journey
              towards
              your
              dreams—one step at a time.
            </p>
            <div>
              <a href="{{ route('start') }}">
                <x-button>
                  <span>Get Started</span>
                  <i data-lucide="arrow-right" class="size-5"></i>
                </x-button>
              </a>
            </div>
          </div>
          <div class="items-center justify-center hidden lg:flex">
            <img src="{{ asset('hero.png') }}" class="w-full max-w-96" alt="hero">
          </div>
        </div>
      </main>
    </div>

    <div class="absolute bottom-0 w-full min-w-ornament">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path class="fill-secondary" fill-opacity="1"
          d="M0,96L60,96C120,96,240,96,360,117.3C480,139,600,181,720,192C840,203,960,181,1080,165.3C1200,149,1320,139,1380,133.3L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
      </svg>
    </div>

    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>
</x-landing-layout>
