@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full bg-zinc-950 text-white border-zinc-800 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
