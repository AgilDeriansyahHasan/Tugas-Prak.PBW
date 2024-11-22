<!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<a {{ $attributes }} class="{{ request()->path==url('href') ? 'bg-zinc-800 text-white' : 'text-zinc-300 hover:bg-zinc-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
{{$slot}}
</a>    