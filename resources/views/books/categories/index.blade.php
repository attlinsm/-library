<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <x-button class="mt-4">
                        <a href="{{ route('books.categories.create') }}">{{ __('New Category') }}</a>
                    </x-button>
                </div>
                @foreach($categories as $category)
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <div>
                                <h1 class="mt-8 text-2xl font-medium text-gray-900">
                                    <x-label value="{{ __('Category: ') }}"/>
                                    <a href="#">{{ $category->title }}</a>
                                </h1>

                                <p class="mt-6 text-gray-500 leading-relaxed">
                                    <x-label value="{{ __('Slug: ') }}"/>
                                    {{ $category->slug }}
                                </p>

                            </div>

                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('books.categories.edit', $category)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('books.categories.destroy', $category) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('books.categories.destroy', $category)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
