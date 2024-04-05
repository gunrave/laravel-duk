<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Tukin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('tukins.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="mt-4">
                            {{-- <x-dropdown>
                                <x-slot name="trigger">
                                        Periode
                                </x-slot>
                                <x-slot name="content">
                                    <p><a href="#">15 Desember - 14 Januari</a></p>
                                    <p><a href="#">15 Januari - 14 Februari</a></p>
                                    <p><a href="#">15 Februari - 14 Maret</a></p>
                                    <p><a href="#">15 Maret - 14 April</a></p>
                                    <p><a href="#">15 April - 14 Mei</a></p>
                                </x-slot>
                            </x-dropdown> --}}
                            {{-- <x-label for="periode" value="{{ __('Periode') }}" />
                            <select name="periode" id="periode">
                                <option value="#">Pilih Periode</option>
                                <option value="1">15 Desember - 14 Januari</option>
                                <option value="2">15 Januari - 14 Februari</option>
                                <option value="3">15 Februari - 14 Maret</option>
                                <option value="4">15 Maret - 14 April</option>
                                <option value="5">15 April - 14 Mei</option>
                                <option value="6">15 Mei - 14 Juni</option>
                                <option value="7">15 Juni - 14 Juli</option>
                                <option value="8">15 Juli - 14 Agustus</option>
                                <option value="9">15 Agustus - 14 September</option>
                                <option value="10">15 September - 14 Oktober</option>
                                <option value="11">15 Oktober - 14 November</option>
                                <option value="12">15 November - 14 Desember</option>
                            </select>

                            <x-label for="tahun" value="{{ __('Tahun') }}" />
                            {{-- <x-input id="periode" class="block mt-1" type="month" name="periode" :value="old('periode')" autofocus autocomplete="periode" /> --}}
                            {{-- <x-input id="tahun" class="block mt-1" type="number" min="2024" max="2074" name="tahun" :value="old('tahun')" autofocus autocomplete="tahun" />
                        </div> --}}

                        {{-- <div class="flex mt-4">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div> --}}

                        <div class="mt-4">
                            <x-label for="bulantahun" value="{{ __('Bulan/Tahun') }}" />
                            <x-input id="bulantahun" class="block mt-1" type="month" name="periode" :value="old('bulan/tahun')" autofocus autocomplete="bulan/tahun" />
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Tunjangan Kinerja') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
