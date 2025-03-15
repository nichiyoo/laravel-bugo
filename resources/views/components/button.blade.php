<button
  {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex gap-2 items-center px-6 py-3 bg-accent-300 border border-transparent rounded-full font-semibold uppercase text-sm text-zinc-900 hover:bg-accent-400 active:bg-accent-400 focus:outline-none focus:ring-2 focus:ring-accent-400 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>
