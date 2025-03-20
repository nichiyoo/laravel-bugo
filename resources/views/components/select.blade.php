@props(['disabled' => false])

<select
  {{ $attributes->merge([
      'class' =>
          'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-6 py-3 shadow-lg text-zinc-900 rounded-full input-shadow',
  ]) }}>
  {{ $slot }}
</select>
