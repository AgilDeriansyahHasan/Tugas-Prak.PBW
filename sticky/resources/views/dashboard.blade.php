<x-app-layout>

    @slot('title','Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl  leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <x-container>
                <div class="p-6 ">
                    {{ __("You're logged in!") }}
                </div>
        </x-container>
</x-app-layout>
