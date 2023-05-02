<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-section-title>
                    <x-slot name="title">{{ __('Create new employee') }}</x-slot>
                    <x-slot name="description">{{ __('Form for a new employee, where you need to specify his email, password.') }}</x-slot>
                </x-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                            <form action="{{ route('employees.store') }}" method="POST">
                                @csrf
                                <div class="col-span-6 sm:col-span-4 mt-2">
                                    <x-label for="name" value="{{ __('Name') }}" />
                                    <x-input id="name" type="text" class="mt-1 block w-full" name="name"/>
                                    <x-input-error for="name" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 mt-2">
                                    <x-label for="email" value="{{ __('Email') }}" />
                                    <x-input id="email" type="email" class="mt-1 block w-full" name="email"/>
                                    <x-input-error for="email" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 mt-2">
                                    <x-label for="password" value="{{ __('Password') }}" />
                                    <x-input id="password" type="password" class="mt-1 block w-full" name="password"/>
                                    <x-input-error for="password" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 mt-2">
                                    <x-label for="password_confirmation" value="{{ __('Password') }}" />
                                    <x-input id="password_confirmation" type="password" class="mt-1 block w-full" name="password_confirmation"/>
                                    <x-input-error for="password_confirmation" class="mt-2" />
                                </div>

                                <div class="mt-4 space-x-2 mb-5 mt-2">
                                    <x-button>{{ __('Save') }}</x-button>
                                    <a href="{{ route('employees.index') }}">{{ __('Cancel') }}</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
