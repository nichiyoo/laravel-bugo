<x-landing-layout>

  <body class="relative min-h-screen overflow-x-hidden font-sans text-white bg-pattern pb-60">
    <main class="container relative grid gap-16 max-w-7xl">
      @include('layouts.partials.navbar')


      <div class="flex items-end gap-10">
        <div class="flex flex-col gap-4">
          <h1 class="text-5xl font-bold text-shadow">Create Article</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, inventore aspernatur! Illo ratione
            distinctio, dignissimos iste possimus minus aliquam qui?
          </p>
        </div>
      </div>

      <form action="{{ route('articles.update', $article) }}" method="POST" class="flex flex-col gap-4">
        @csrf
        @method('PUT')

        <div>
          <x-text-input id="title" class="block w-full" placeholder="Title" type="text" name="title"
            :value="old('title') ?? $article->title" required autofocus autocomplete="title" />
          <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
          <x-textarea-input id="description" class="block w-full" placeholder="Description" name="description" required
            autocomplete="description">{{ old('description') ?? $article->description }}</x-textarea-input>
          <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div>
          <x-text-input id="source_url" class="block w-full" placeholder="Source URL" type="text" name="source_url"
            :value="old('source_url') ?? $article->source_url" required autocomplete="source_url" />
          <x-input-error :messages="$errors->get('source_url')" class="mt-2" />
        </div>

        <div>
          <x-text-input id="video_url" class="block w-full" placeholder="Video URL" type="text" name="video_url"
            :value="old('video_url') ?? $article->video_url" required autocomplete="video_url" />
          <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center gap-2">
          <x-button class="input-shadow">
            {{ __('Update Article') }}
          </x-button>

          <a href="{{ route('dashboard') }}">
            <x-button type="button" class="input-shadow bg-secondary hover:bg-secondary">
              {{ __('Cancel') }}
            </x-button>
          </a>
        </div>
      </form>
    </main>

    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>
</x-landing-layout>
