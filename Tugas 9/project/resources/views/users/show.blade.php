<x-app-layout title="Show">
    <x-slot name="heading">{{ $user->name }}</x-slot>

    {{ $user -> email }}
    {{ $user -> created_at->diffforhumans() }}
</x-app-layout>
