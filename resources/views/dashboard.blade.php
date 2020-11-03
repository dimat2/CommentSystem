<x-app-layout xmlns:livewire="http://www.w3.org/1999/html">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg flex justify-center">
                <div class="w-10/12 my-10 flex">
                    <div class="w-5/12 rounded border p-2">
                        <livewire:tickets />
                    </div>
                    <div class="w-7/12 mx-2 rounded border p-2">
                        <livewire:comments />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
