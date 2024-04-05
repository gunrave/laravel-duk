<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Penagih') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('penagihs.update', $penagih) }}">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-label for="nama" value="{{ __('Nama Penagih') }}" />
                            <x-input id="nama" class="block mt-1" type="text" name="nama" :value="$penagih->nama" required autofocus autocomplete="nama" />
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Update Penagih') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
