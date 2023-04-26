<x-form-section submit="store">

    <x-slot name="title">
        {{ __('New book') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add new book to your library') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="title" value="{{ __('Title') }}" />
            <x-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title"/>
            <x-input-error for="title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="slug" value="{{ __('Slug') }}" />
            <x-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="slug" autocomplete="slug"/>
            <x-input-error for="slug" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="author" value="{{ __('Author') }}" />
            <x-input id="author" type="text" class="mt-1 block w-full" wire:model.defer="author" autocomplete="author"/>
            <x-input-error for="author" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="description" value="{{ __('Description') }}" />
            <x-textarea id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description"/>
            <x-input-error for="description" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="category_id" value="{{ __('Category') }}" />
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="category_id" type="text" class="mt-1 block w-full" wire:model.defer="category_id">
                <option selected="">{{ __('Choose the category') }}</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            <x-input-error for="category_id" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="rating" value="{{ __('Rating') }}" />
            <x-input id="rating" type="text" class="mt-1 block w-full" wire:model.defer="rating"/>
            <x-input-error for="rating" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="cover" value="{{ __('Cover') }}" />
            <x-input id="cover" type="file" class="mt-1 block w-full" wire:model.defer="cover"/>
            <x-input-error for="cover" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">

        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>

    </x-slot>

</x-form-section>
