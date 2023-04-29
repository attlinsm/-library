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

                            <table class="table-auto border w-full">
                                <thead class="border">
                                <tr>
                                    <th class="border">{{ __('№') }}</th>
                                    <th class="border">{{ __('Name') }}</th>
                                    <th class="border">{{ __('Email') }}</th>
                                    <th class="border">{{ __('Date of creating') }}</th>
                                </tr>
                                </thead>
                                <tbody class="border">
                                <tr>
                                    @foreach($employees as $id => $employee)
                                        <td class="border">{{ $id + 1 }}</td>
                                        <td class="border">{{ $employee->name }}</td>
                                        <td class="border">{{ $employee->email }}</td>
                                        <td class="border">{{ $employee->created_at }}</td>
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
