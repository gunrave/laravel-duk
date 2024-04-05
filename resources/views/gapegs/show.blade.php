<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rincian Gaji Pokok {{ date('F Y', strtotime($gapok->bulan_tahun)) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('gaji-import') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-4">
                            <div class="custom-file text-left inline-flex">
                                <input type="file" name="gapok_pegawais" class="custom-file-input" id="gapok_pegawais">
                                <input type="hidden" name="gapok" value="{{ $id }}">
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Detail Gaji Pokok') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NIK/Nama/Pangkat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Bulan dan Tahun
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($gapegs as $gapeg)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{-- {{ dd($gapeg->pegawais->nama) }} --}}
                                    {{ $gapeg->pegawais->nama }}
                                    <p>{{ $gapeg->pegawais->nik }} </p>
                                    @foreach ($gapeg->pegawais->pangkats as $pangkat)
                                        <p>{{ $pangkat->nama }} {{ $pangkat->golongan }}</p>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ $gapeg->gapoks->bulan_tahun }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    @rupiah($gapeg->nilai)
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="4"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __('Tidak ada Data Gaji') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $gapegs->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
