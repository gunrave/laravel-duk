<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('pegawais.update', $pegawai) }}">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-label for="nama" value="{{ __('Nama') }}" />
                            <x-input id="nama" class="block mt-1" type="text" name="nama" :value="$pegawai->nama" required autofocus autocomplete="nama" />
                        </div>
                        <div class="mt-4">
                            <x-label for="nik" value="{{ __('NIK') }}" />
                            <x-input id="nik" class="block mt-1" type="text" name="nik" :value="$pegawai->nik" required autofocus autocomplete="nik" />
                        </div>
                        <div class="mt-4">
                            <div>
                                <x-label for="pangkat" value="{{ __('Pangkat/Golongan') }}" />
                                <select class="block mt-1" name="pangkat_id" id="pangkat">
                                    @foreach ($pangkats as $pangkat)
                                        <option value="{{ $pangkat->id }}" {{ $pangkat_pegawai->id === $pangkat->id ? 'selected' : '' }}>{{ $pangkat->pangkat }} {{ $pangkat->golongan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-4">
                            <x-label for="tmt_pangkat" value="{{ __('TMT Pangkat') }}" />
                            <x-input id="tmt_pangkat" class="block mt-1" type="date" name="tmt_pangkat" :value="$tmt_pangkat->tmt_pangkat" required autofocus autocomplete="tmt_pangkat" />
                        </div>
                        <div class="mt-4">
                            <x-label for="jabatan" value="{{ __('Jabatan') }}" />
                            <x-input id="jabatan" class="block mt-1" type="text" name="jabatan" :value="$pegawai->jabatan" required autofocus autocomplete="jabatan" />
                        </div>
                        <div class="mt-4">
                            <x-label for="tmt_jabatan" value="{{ __('TMT Jabatan') }}" />
                            <x-input id="tmt_jabatan" class="block mt-1" type="date" name="tmt_jabatan" :value="$pegawai->tmt_jabatan" required autofocus autocomplete="tmt_jabatan" />
                        </div>
                        <div class="mt-4">
                            <x-label for="eselon" value="{{ __('Eselon') }}" />
                            <select class="block mt-1" name="eselon" id="eselon">
                                    <option value="Ia" {{ $pegawai->eselon === 'Ia' ? 'selected' : '' }}>Ia</option>
                                    <option value="IIa" {{ $pegawai->eselon === 'IIa' ? 'selected' : '' }}>IIa</option>
                                    <option value="IIIa" {{ $pegawai->eselon === 'IIIa' ? 'selected' : '' }}>IIIa</option>
                                    <option value="IVa" {{ $pegawai->eselon === 'IVa' ? 'selected' : '' }}>IVa</option>
                                    <option value="Koordinator" {{ $pegawai->eselon === 'Koordinator' ? 'selected' : '' }}>Koordinator</option>
                                    <option value="Sub Koordinator" {{ $pegawai->eselon === 'Sub Koordinator' ? 'selected' : '' }}>Sub Koordinator</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="bagian_wilayah" value="{{ __('Bagian / Wilayah') }}" />
                            <select class="block mt-1" name="bagian_wilayah" id="bagian_wilayah">
                                    <option value="Inspektur Wilayah" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah' ? 'selected' : '' }}>Inspektur Wilayah</option>
                                    <option value="Sekretaris Inspektorat Jenderal" {{ $pegawai->bagian_wilayah === 'Sekretaris Inspektorat Jenderal' ? 'selected' : '' }}>Sekretaris Inspektorat Jenderal</option>
                                    <option value="Inspektur Wilayah I" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah I' ? 'selected' : '' }}>Inspektur Wilayah I</option>
                                    <option value="Inspektur Wilayah II" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah II' ? 'selected' : '' }}>Inspektur Wilayah II</option>
                                    <option value="Inspektur Wilayah III" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah III' ? 'selected' : '' }}>Inspektur Wilayah III</option>
                                    <option value="Inspektur Wilayah IV" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah IV' ? 'selected' : '' }}>Inspektur Wilayah IV</option>
                                    <option value="Inspektur Wilayah V" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah V' ? 'selected' : '' }}>Inspektur Wilayah V</option>
                                    <option value="Inspektur Wilayah VI" {{ $pegawai->bagian_wilayah === 'Inspektur Wilayah VI' ? 'selected' : '' }}>Inspektur Wilayah VI</option>
                                    <option value="Keuangan" {{ $pegawai->bagian_wilayah === 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                    <option value="Kepegawaian" {{ $pegawai->bagian_wilayah === 'Kepegawaian' ? 'selected' : '' }}>Kepegawaian</option>
                                    <option value="Hubungan Masyarakat dan Sistem Informasi Pengawasan" {{ $pegawai->bagian_wilayah === 'Hubungan Masyarakat dan Sistem Informasi Pengawasan' ? 'selected' : '' }}>Hubungan Masyarakat dan Sistem Informasi Pengawasan</option>
                                    <option value="Program dan Pelaporan" {{ $pegawai->bagian_wilayah === 'Program dan Pelaporan' ? 'selected' : '' }}>Program dan Pelaporan</option>
                                    <option value="Umum" {{ $pegawai->bagian_wilayah === 'Umum' ? 'selected' : '' }}>Umum</option>
                            </select>
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Update pegawai') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

