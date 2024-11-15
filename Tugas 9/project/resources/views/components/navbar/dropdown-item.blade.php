        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<a {{ $attributes }} 
    class="{{ request()->fullUrlIs(url($href)) ? "bg-zinc-800 text-white" : "text-zinc-300 hover:bg-zinc-700 hover:text-white" }} block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
    {{ $slot }}
</a>
