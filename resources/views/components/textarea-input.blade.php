@props(['disabled' => false])

<textarea @disabled($disabled) rows="5"
  {{ $attributes->merge([
      'class' =>
          'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-6 py-3 shadow-lg text-zinc-900 rounded-3xl input-shadow placeholder:text-center placeholder:uppercase',
  ]) }}>{{ $slot }}</textarea>
