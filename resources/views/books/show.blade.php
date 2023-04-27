<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-section-title>
                    <x-slot name="title">{{ __('Book information') }}</x-slot>
                    <x-slot name="description">{{ __('Check information about selected book like title, slug, author, description, rating, cover(image).') }}</x-slot>
                </x-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                            <x-label value="{{ __('Title: ' . $book->title ) }}" />
                            <x-section-border />

                            <div class="mt-10 sm:mt-0">
                                <x-label value="{{ __('Slug: ' . $book->slug) }}" />
                            </div>

                            <x-section-border />

                            <div class="mt-10 sm:mt-0">
                                <x-label value="{{ __('Author: ' . $book->author) }}" />
                            </div>

                            <x-section-border />

                            <div class="mt-10 sm:mt-0">
                                <x-label value="{{ __('Description:') }}" />
                                {{ $book->description }}
                            </div>

                            <x-section-border />

                            <div class="mt-10 sm:mt-0">
                                <x-label value="{{ __('Rating: ' . $book->rating) }}" />
                            </div>

                            <x-section-border />

                            <div class="mt-10 sm:mt-0">
                                <x-label value="{{ __('Cover:') }}" />
                                <img src="{{ asset('storage/cover/' . $book->cover) }}" alt="Book cover">
                            </div>

                            <x-section-border />

                            <x-button>
                                <a href="{{ route('books.edit', $book) }}">{{ __('Edit') }}</a>
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
