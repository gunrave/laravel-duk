<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-fit mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <h2 class="text-2xl font-bold text-gray-900">Add One</h2>
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('pegawais.store') }}">
                        @csrf

                        <div class="mt-4">
                            <x-label for="nama" value="{{ __('Nama') }}" />
                            <x-input id="nama" class="block mt-1" type="text" name="nama" :value="old('nama')" autofocus autocomplete="nama" />
                        </div>
                        <div class="mt-4">
                            <x-label for="nik" value="{{ __('NIK') }}" />
                            <x-input id="nik" class="block mt-1" type="text" name="nik" :value="old('nik')" autofocus autocomplete="nik" />
                        </div>
                        <div class="mt-4">
                            <x-label for="pangkat" value="{{ __('Pangkat/Golongan') }}" />
                            <select class="block mt-1" name="pangkat_id" id="pangkat">
                                @foreach ($pangkats as $pangkat)
                                    <option value="{{ $pangkat->id }}">{{ $pangkat->pangkat }} {{ $pangkat->golongan }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="tmt_pangkat" value="{{ __('TMT Pangkat') }}" />
                            <x-input id="tmt_pangkat" class="block mt-1" type="date" name="tmt_pangkat" :value="old('tmt_pangkat')" autofocus autocomplete="tmt_pangkat" />
                        </div>
                        <div class="mt-4">
                            <x-label for="jabatan" value="{{ __('Jabatan') }}" />
                            <x-input id="jabatan" class="block mt-1" type="text" name="jabatan" :value="old('jabatan')" autofocus autocomplete="jabatan" />
                        </div>
                        <div class="mt-4">
                            <x-label for="tmt_jabatan" value="{{ __('TMT Jabatan') }}" />
                            <x-input id="tmt_jabatan" class="block mt-1" type="date" name="tmt_jabatan" :value="old('tmt_jabatan')" autofocus autocomplete="tmt_jabatan" />
                        </div>
                        <div class="mt-4">
                            <x-label for="eselon" value="{{ __('Eselon') }}" />
                            <select class="block mt-1" name="eselon" id="eselon">
                                    <option value="Ia">Ia</option>
                                    <option value="IIa">IIa</option>
                                    <option value="IIIa">IIIa</option>
                                    <option value="IVa">IVa</option>
                                    <option value="Koordinator">Koordinator</option>
                                    <option value="Sub Koordinator">Sub Koordinator</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="bagian_wilayah" value="{{ __('Bagian / Wilayah') }}" />
                            <select class="block mt-1" name="bagian_wilayah" id="bagian_wilayah">
                                    <option value="Inspektur Wilayah">Inspektur Wilayah</option>
                                    <option value="Sekretaris Inspektorat Jenderal">Sekretaris Inspektorat Jenderal</option>
                                    <option value="Inspektur Wilayah I">Inspektur Wilayah I</option>
                                    <option value="Inspektur Wilayah II">Inspektur Wilayah II</option>
                                    <option value="Inspektur Wilayah III">Inspektur Wilayah III</option>
                                    <option value="Inspektur Wilayah IV">Inspektur Wilayah IV</option>
                                    <option value="Inspektur Wilayah V">Inspektur Wilayah V</option>
                                    <option value="Inspektur Wilayah VI">Inspektur Wilayah VI</option>
                                    <option value="Keuangan">Keuangan</option>
                                    <option value="Kepegawaian">Kepegawaian</option>
                                    <option value="Hubungan Masyarakat dan Sistem Informasi Pengawasan">Hubungan Masyarakat dan Sistem Informasi Pengawasan</option>
                                    <option value="Program dan Pelaporan">Program dan Pelaporan</option>
                                    <option value="Umum">Umum</option>
                            </select>
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save pegawai') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
