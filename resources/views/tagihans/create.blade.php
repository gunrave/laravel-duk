<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Tagihan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('tagihans.store') }}">
                        @csrf

                        <div class="mt-4">

                            @livewire('show-penagihs')

                        </div>
                        <div class="mt-4">
                            @livewire('show-penagihs')
                        </div>
                        <div class="mt-4">
                            @livewire('show-penagihs')
                        </div>

                        {{-- <div class="mt-4">
                            <x-label for="nama" value="{{ __('Nama Penagih') }}" />
                            <x-input id="nama" class="block mt-1" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="nama" />
                        </div>

                        <div class="mt-4">
                            <x-label for="penagih" value="{{ __('Nama Pegawai') }}" />
                            <select class="block mt-1" name="penagih_id" id="penagih">
                                @foreach ($penagihs as $penagih)
                                    <option value="{{ $penagih->id }}">{{ $penagih->nama }}</option>

                                @endforeach
                            </select>
                        </div> --}}

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Tagihan') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>