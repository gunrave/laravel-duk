<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rincian Tunjangan Kinerja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg px-4 py-4">
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('tunker-import') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-4">
                            <div class="custom-file text-left inline-flex">
                                <input type="file" name="tunker_pegawais" class="custom-file-input" id="tunker_pegawais">
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Save Detail Tunjangan Kinerja') }}
                            </x-button>
                        </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NIK/Nama/Pangkat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Periode
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nilai
                            </th>

                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($gapegs as $gapeg)

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
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

                                <td class="px-6 py-4">
                                    <a href="{{ route('pangkats.edit', $gapeg) }}"
                                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                                    <form action="{{ route('pangkats.destroy', $gapeg) }}" method="post" class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <x-danger-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-danger-button>

                                    </form>

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
