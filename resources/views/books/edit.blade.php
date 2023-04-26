<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="title" value="{{ __('Title') }}" />
                    <x-input id="title" type="text" class="mt-1 block w-full" name="title" value="{{ $book->title }}"/>
                    <x-input-error for="title" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <x-label for="slug" value="{{ __('Slug') }}" />
                    <x-input id="slug" type="text" class="mt-1 block w-full" name="slug" value="{{ $book->slug }}"/>
                    <x-input-error for="slug" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <x-label for="author" value="{{ __('Author') }}" />
                    <x-input id="author" type="text" class="mt-1 block w-full" name="author" value="{{ $book->author }}"/>
                    <x-input-error for="author" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <x-label for="description" value="{{ __('Description') }}" />
                    <x-textarea id="description" type="text" class="mt-1 block w-full" name="description">{{ $book->description }}</x-textarea>
                    <x-input-error for="description" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <x-label for="category_id" value="{{ __('Category') }}" />
                    <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" id="category_id" type="text" class="mt-1 block w-full" wire:model.defer="category_id">
                        <option selected="">{{ __('Choose the category') }}</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category_id" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <x-label for="rating" value="{{ __('Rating') }}" />
                    <x-input id="rating" type="text" class="mt-1 block w-full" name="rating" value="{{ $book->rating }}"/>
                    <x-input-error for="rating" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-5">
                    <x-label for="cover" value="{{ __('Cover') }}" />
                    <x-input id="cover" type="file" class="mt-1 block w-full" name="cover"/>
                    <x-input-error for="cover" class="mt-2" />
                </div>
                <div class="mt-4 space-x-2 mb-5">
                    <x-button>{{ __('Save') }}</x-button>
                    <a href="{{ route('books.categories.index') }}">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
