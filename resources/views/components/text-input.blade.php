@props(['disabled' => false])

<input @disabled($disabled)
  {{ $attributes->merge([
      'class' =>
          'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-6 py-3 text-zinc-900 rounded-full input-shadow placeholder:text-center placeholder:uppercase',
  ]) }}>
