<x-app-layout>
    <x-slot name="title">
        Create New Store
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Store') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-container>
            <x-card class="max-w-2xl">
                <x-slot name="header">
                    <x-card.title>
                        {{ __('Create New Store') }}
                    </x-card.title>
                    <x-card.description>
                        {{ __('You can create up to 5 stores.') }}
                    </x-card.description>
                </x-slot>

                <x-card.content>
                    <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <!-- Logo Input -->
                        <div class="mb-4">
                            <x-input-label for="logo" class="sr-only" :value="__('Logo')" />
                            <input id="logo" name="logo" type="file" class="block mt-1 w-full" />
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                        </div>

                        <!-- Name Input -->
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Description Input -->
                        <div class="mb-4">
                            <x-input-label for="description" :value="__('description')" />
                            <x-textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description') }}</x-textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Submit Button -->
                        <x-primary-button>
                            {{ __('Create') }}
                        </x-primary-button>
                    </form>
                </x-card.content>
            </x-card>
        </x-container>
    </div>
</x-app-layout>
