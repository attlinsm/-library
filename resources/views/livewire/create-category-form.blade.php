<x-form-section submit="createCategory">

    <x-slot name="title">
        {{ __('New category') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Create the book category you need') }}
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
