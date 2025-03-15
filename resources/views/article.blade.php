<x-landing-layout>

  <body class="relative min-h-screen overflow-x-hidden font-sans text-white bg-pattern pb-60">
    <svg class="absolute top-0 right-0"width="1041" height="753" viewBox="0 0 1041 753" fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M1133 216.5C1133 380.252 1293.75 752.162 1045.5 752.162C797.248 752.162 825.5 144 0 -12.5C0 -176.252 435.248 -80.0001 683.5 -80.0001C1163.5 -167.385 1133 52.7475 1133 216.5Z"
        fill="#7B212F" />
    </svg>

    <main class="container relative grid gap-16 max-w-7xl">
      @include('layouts.partials.navbar')

      <div class="flex flex-col gap-10">
        <div class="flex flex-col w-full max-w-2xl gap-6">
          <h1 class="text-4xl font-bold text-shadow">{{ $article->title }}</h1>
          <p>{{ $article->description }}</p>
        </div>

        <div class="relative">
          <div class="absolute top-0 left-0 z-4 size-0 triangle -ms-4"></div>
          <div class="absolute top-0 left-0 w-40 px-4 py-2 -translate-y-1/2 rounded-full z-5 -ms-5 bg-secondary">
            <span class="font-bold text-zinc-900">Watch This</span>
          </div>

          <div class="grid items-end w-full grid-cols-3 gap-6">
            <iframe class="w-full lg:col-span-2 aspect-video" src="{{ $article->video_url }}"
              title="{{ $article->title }}" frameborder="0" referrerpolicy="strict-origin-when-cross-origin"></iframe>

            <div class="flex flex-col items-end">
              <a href="{{ $article->source_url }}" target="_blank" class="flex items-center gap-2 text-shadow">
                <i data-lucide="search" class="size-6"></i>
                <h2 class="text-2xl font-bold">Read this.</h2>
              </a>
              <span>How to get out of debt.</span>
            </div>
          </div>
        </div>
      </div>
    </main>


    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>

</x-landing-layout>
