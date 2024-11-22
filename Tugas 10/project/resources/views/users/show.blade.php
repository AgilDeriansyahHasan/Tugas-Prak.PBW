<x-app-layout title="Show">
    <x-slot name="heading">{{ $user->name }}</x-slot>

    {{ $user -> email }}
    {{ $user -> created_at->diffforhumans() }}

    <form action="/users/{{ $user->id }}" method="post" class="mt-6">
    @method('DELETE')    
    @csrf
        <x-button type="submit">
            Delete
        </x-button>
</form>
</x-app-layout>
