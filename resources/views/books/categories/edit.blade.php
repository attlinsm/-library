<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('books.categories.update', $category) }}">
            @csrf
            @method('patch')
            <div class="col-span-6 sm:col-span-4">
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input id="title" type="text" class="mt-1 block w-full" name="title" autocomplete="title"/>
                <x-input-error for="title" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mt-5">
                <x-label for="slug" value="{{ __('Slug') }}" />
                <x-input id="slug" type="text" class="mt-1 block w-full" name="slug" autocomplete="slug"/>
                <x-input-error for="slug" class="mt-2" />
            </div>
            <div class="mt-4 space-x-2">
                <x-button>{{ __('Save') }}</x-button>
                <a href="{{ route('books.categories.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
