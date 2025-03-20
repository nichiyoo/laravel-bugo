<x-landing-layout>

  <body class="relative min-h-screen overflow-x-hidden font-sans text-white bg-pattern pb-60">
    <main class="container grid gap-16 max-w-7xl">
      @include('layouts.partials.navbar')

      <div class="grid items-center gap-10 py-20 lg:grid-cols-3">
        <div class="items-center justify-center hidden lg:flex">
          <img src="{{ asset('question.png') }}" class="w-full max-w-96" alt="question">
        </div>
        <div class="flex flex-col gap-6 lg:col-span-2">
          <h1 class="flex flex-col gap-4 text-6xl text-shadow">
            <span class="block">Hey Bud!</span>
            <span class="font-bold">Are You Having Financial Problems?</span>
          </h1>
          <p>
            We found out that individuals nowadays are having major problems in saving their money. These are called
            financial problems, and it&apos;ll slow down their will to save lots of money for their future.
          </p>
        </div>
      </div>

      <div class="flex flex-col items-center gap-6 p-10 text-center bg-secondary text-zinc-900 rounded-3xl">
        <h2 class="text-2xl font-bold text-darker">Don&apos;t Worry!</h2>
        <p class="w-full max-w-3xl">
          We identified five most critical financial challenges individuals are facing today, backed by trusted academic
          and institutional studies. Explore each issue below to access evidence-based insights and actionable solutions
          from reputable sources.
        </p>
      </div>

      <div class="flex flex-col items-center gap-6 text-center">
        <h2 class="text-4xl font-bold text-shadow">What&apos;s Your Problem?</h2>

        <div class="flex flex-wrap justify-center w-full">
          @foreach ($articles as $article)
            <a href="{{ route('get-started.show', $article->slug) }}" class="p-6 basis-full lg:basis-1/3">
              <div class="flex items-center justify-center h-40 p-6 text-center bg-foreground box-shadow rounded-3xl">
                <h3 class="text-lg font-semibold">{{ $article->title }}</h3>
              </div>
            </a>
          @endforeach
        </div>

        <div class="w-full">
          <div class="[&_p]:text-white">
            {{ $articles->links() }}
          </div>
        </div>

        <h2 class="text-4xl font-bold text-shadow">We&apos;re The Right Buddy to Help You Out!</h2>
      </div>
    </main>


    <div class="absolute bottom-0 w-full h-28 bg-foreground"></div>
    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>

</x-landing-layout>
