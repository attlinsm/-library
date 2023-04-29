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
                    <x-slot name="title">{{ __('Table with all employees of this library') }}</x-slot>
                    <x-slot name="description">{{ __('Check information about all employees of this library like their name, email, date of creating and other.') }}</x-slot>
                </x-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <table class="min-w-full border divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">{{ __('№') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">{{ __('Name') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">{{ __('Email') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">{{ __('Date of creating') }}</th>
                                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 relative">
                                <tr>
                                    @foreach($employees as $id => $employee)
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $id + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $employee->created_at }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <x-dropdown>
                                                <x-slot name="trigger">
                                                    <button>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        </svg>
                                                    </button>
                                                </x-slot>
                                                <x-slot name="content">
                                                    <x-dropdown-link :href="route('employees.edit', $employee)">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                    <form method="POST" action="{{ route('employees.destroy', $employee) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <x-dropdown-link :href="route('employees.destroy', $employee)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                            {{ __('Delete') }}
                                                        </x-dropdown-link>
                                                    </form>
                                                </x-slot>
                                            </x-dropdown>
                                        </td>
                                    @endforeach
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
