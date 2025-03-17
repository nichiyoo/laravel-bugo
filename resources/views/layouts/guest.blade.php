<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700,800,900" rel="stylesheet" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="relative h-screen overflow-hidden font-sans text-white bg-background pb-60">
  <div class="absolute top-0 left-0 hidden w-screen h-screen lg:block">
    <div class="grid w-full h-full grid-cols-2">
      <div class="relative w-full h-full">
        <div class="absolute top-0 right-0">
          <svg class="h-screen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 220 1080">
            <path class="fill-secondary"
              d="M0,1080H220.91V.27L42,0c26.24,162.66,61.87,288.63,89.85,374.23,29.21,89.34,47.63,127.19,50.73,200,4.7,110.45-30.25,198-65.22,285.51A1149.23,1149.23,0,0,1,0,1080Z" />
          </svg>
        </div>
      </div>

      <div class="w-full h-full bg-secondary"></div>
    </div>
  </div>

  <div class="absolute z-10 w-full">
    <div class="container max-w-7xl lg:text-zinc-900">
      @include('layouts.partials.navbar')
    </div>
  </div>

  <main class="container relative flex flex-col items-center gap-20 pt-60 lg:pt-0 lg:flex-row lg:h-screen max-w-7xl">
    <div class="basis-full lg:basis-1/2">
      @if ($errors->any())
        <div class="flex flex-col gap-4 text-6xl text-shadow">
          <span class="block ">Oops! There&apos;s been a mistake!</span>
          <span class="font-bold">Try again, Bud!</span>
        </div>
      @else
        <div class="flex flex-col gap-4 text-6xl text-shadow">
          <span class="block font-bold">Hi Buddy!</span>
          <span> It&apos;s Nice to Have You Back!</span>
        </div>
      @endif
    </div>

    <div class="basis-full lg:basis-1/2">
      {{ $slot }}
    </div>
  </main>

  <div class="absolute bottom-0 w-full py-10 text-center">
    <span class="font-bold lg:text-zinc-900">
      &copy; Copyright BUGO {{ date('Y') }}.
    </span>
  </div>
</body>

</html>
