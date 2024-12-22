<x-app-layout>
    <x-slot name="title">
        Store
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Store') }}
        </h2>
    </x-slot>

    <x-container>
        @foreach($stores as $store)
        <x-card class="p6 pb-0">
        <img src="{{ $store-> logo }}" alt="{{ $store->name }}" class="size-16 rounded-lg">
        <h2>{{$store->name}}</h2>
        <x-card.description>
            {{ $store->description }}
        </x-card.description>
        @if($store->user_id == auth()->user()->id)
        <a href="{{ route('stores.edit',$store) }}" class="underline text-blue-600">
            Edit
        </a>
        @endif
        </x-card>
        @endforeach
    </x-container>
</x-app-layout>
