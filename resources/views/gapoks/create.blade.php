<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Gaji Pokok') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('gapoks.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-4">
                            <x-label for="bulantahun" value="{{ __('Bulan/Tahun') }}" />
                            <x-input id="bulantahun" class="block mt-1" type="date" name="bulan_tahun" :value="old('bulan/tahun')" autofocus autocomplete="bulan/tahun" />
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Gaji Pokok') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
