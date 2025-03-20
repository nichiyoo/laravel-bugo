<x-landing-layout>

  <body class="relative min-h-screen overflow-x-hidden font-sans text-white bg-pattern pb-60">
    <main class="container relative grid gap-16 max-w-7xl">
      @include('layouts.partials.navbar')


      <div class="flex items-end gap-10">
        <div class="flex flex-col gap-4">
          <h1 class="text-5xl font-bold text-shadow">Dashboard</h1>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, inventore aspernatur! Illo ratione
            distinctio, dignissimos iste possimus minus aliquam qui?
          </p>
        </div>

        <div class="flex items-center justify-end flex-none">
          <a href="{{ route('articles.create') }}">
            <x-button>
              {{ __('Create Article') }}
            </x-button>
          </a>
        </div>
      </div>

      <x-auth-session-status :status="session('success')" class="text-base text-white" />

      <div class="overflow-auto bg-white rounded-xl text-zinc-500">
        <table class="w-full">
          <thead class="font-medium text-left text-white uppercase bg-darker">
            <tr>
              <th class="px-8 py-4 truncate">{{ __('Title') }}</th>
              <th class="px-8 py-4 truncate">{{ __('Description') }}</th>
              <th class="px-8 py-4 truncate">{{ __('Source') }}</th>
              <th class="px-8 py-4 truncate">{{ __('Video Source') }}</th>
              <th class="px-8 py-4 truncate">{{ __('Actions') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($articles as $article)
              <tr class="text-sm border-b border-gray-200 hover:bg-gray-100">
                <td class="px-8 py-4 truncate max-w-80">{{ $article->title }}</td>
                <td class="px-8 py-4">
                  <p class="line-clamp-2">
                    {{ $article->description }}
                  </p>
                </td>
                <td class="w-40 px-8 py-4">
                  <a target="_blank" href="{{ $article->source_url }}"
                    class="text-blue-500 hover:underline whitespace-nowrap">
                    {{ __('Read More') }}
                  </a>
                </td>
                <td class="w-40 px-8 py-4">
                  <a target="_blank" href="{{ $article->video_url }}"
                    class="text-blue-500 hover:underline whitespace-nowrap">
                    {{ __('View Source') }}
                  </a>
                </td>
                <td class="w-40 px-8 py-4">
                  <div class="flex items-center gap-4">
                    <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:underline">
                      {{ __('Edit') }}
                    </a>

                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-500 hover:underline"
                        onclick="event.preventDefault();
                      if (confirm('{{ __('Are you sure you want to delete this article?') }}')) {
                        this.closest('form').submit();
                      }">
                        {{ __('Delete') }}
                      </button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="[&_p]:text-white">
        {{ $articles->links() }}
      </div>
    </main>

    <div class="absolute bottom-0 w-full py-10 text-center">
      <span class="font-bold text-zinc-900">
        &copy; Copyright BUGO {{ date('Y') }}.
      </span>
    </div>
  </body>
</x-landing-layout>
