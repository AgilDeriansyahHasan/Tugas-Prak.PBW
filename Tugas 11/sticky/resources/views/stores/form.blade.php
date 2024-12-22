<x-app-layout>
    <x-slot name="title">{{ $page_meta['title'] }}</x-slot>
    <x-slot name="header">{{ $page_meta['description'] }}</x-slot>

    <form method="POST" action="{{ $page_meta['url'] }}">
        @csrf
        @method($page_meta['method'])

        <!-- Input fields for editing the store -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $store->name)" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Description input field -->
        <div class="mb-4">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea id="description" class="block mt-1 w-full" name="description" required>{{ old('description', $store->description) }}</x-textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

                    <!-- Logo Input (if you want to allow changing the logo) -->
                    <div class="mb-4">
                <x-input-label for="logo" :value="__('Logo')" />
                <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" />
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    Save
                </x-primary-button>
            </div>
    </form>
</x-app-layout>
