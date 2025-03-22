<x-landing-layout>

  <body class="h-screen overflow-x-hidden font-sans text-white bg-gradient-to-t from-background from-60% to-darker">
    <div class="absolute top-0 w-full min-w-ornament">
      <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#e13d56" fill-opacity="1"
          d="M0,160L60,165.3C120,171,240,181,360,176C480,171,600,149,720,138.7C840,128,960,128,1080,138.7C1200,149,1320,171,1380,181.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
      </svg>
    </div>

    <div class="absolute top-0 z-10 w-full">
      <div class="container max-w-7xl">
        @include('layouts.partials.navbar')
      </div>
    </div>

    <main class="container relative grid items-center h-screen gap-10 max-w-7xl">
      <div>
        <div class="flex flex-col items-center gap-6 text-center">
          <h1 class="text-6xl font-bold text-shadow">Buddy to Your Goals!</h1>
          <span class="text-xl">Your Partner in Achieving Financial Goals</span>
          <p>
            BUGO is a platform created in 2025 with a mission to help people manage their personal finances more easily.
            Inspired by the common struggles of tracking income, handling unexpected expenses, and setting savings
            goals,
            BUGO was built to provide a simple yet effective solution.
            With a user-first approach, BUGO simplifies budget planning and savings tracking. Features like automatic
            accumulation calculations and reminders help promote saving discipline, making financial management more
            accessible and practical for everyone.
          </p>
        </div>
      </div>
    </main>

    <div class="absolute bottom-0 w-full min-w-ornament text-zinc-900">
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
