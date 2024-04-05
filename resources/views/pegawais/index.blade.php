<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pegawai List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:pegawai-table />
            </div>



        </div>
    </div>

    <div class="py-12">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <x-link href="{{ route('pegawais.create')}}" class="m-4">Add new pegawai</x-link>
                    <form action="{{ route('file-import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left inline-flex">
                                <input type="file" name="pegawais" class="custom-file-input" id="customFile">
                            </div>
                            <div class="inline-flex">
                                <x-button>
                                    {{ __('Save pegawai') }}
                                </x-button>
                            </div>

                        </div>
                    </form>
                    <table class="h-full w-full text-sm text-left text-gray-500 dark:text-gray-400 table-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Pegawai / NIK / Pangkat / Jabatan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Gaji Pokok
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tunjangan Kinerja
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($pegawais as $pegawai)
                        {{-- {{ dd($pegawai->pangkats) }} --}}
                            @foreach ($pegawai->pangkats as $pangkat)


                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $pegawai->nama }}
                                        <p>{{ $pegawai->nik }}</p>
                                        <p>{{ $pangkat->nama}} {{ $pangkat->golongan }}</p>
                                        <p>{{ $pegawai->jabatan }}</p>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        @foreach ($pegawai->gapoks as $gapok)
                                            @rupiah($gapok->pivot->nilai)
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        @foreach ($pegawai->tunkins as $tunkin)
                                            @rupiah($tunkin->pivot->nominal)
                                        @endforeach
                                    </td>

                                    {{-- <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $pegawai->eselon }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        {{ $pegawai->bagian_wilayah }}
                                    </td> --}}

                                    <td class="px-6 py-4">
                                        <x-button>Detail</x-button>
                                        <a href="{{ route('pegawais.edit', $pegawai) }}"
                                        class="inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>
                                        <form action="{{ route('pegawais.destroy', $pegawai) }}" method="post" class="inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <x-danger-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-danger-button>

                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="9"
                                    class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    {{ __('No pegawais found') }}
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $pegawais->links() }}
                </div>

            </div>
        </div>
        {{-- <div class="py-12">
        <div class="max-w-max mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white">
                    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                      <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

                      <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @forelse ($pegawais as $pegawai)
                        @foreach ($pegawai->pangkats as $pangkat)
                        <div class="group relative">
                             <div class="mt-4 flex justify-between border-2 border-double">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $pegawai->nama }}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $pegawai->nik }}</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ $pegawai->jabatan }}</p>
                                </div>
                                <p class="text-sm font-medium text-gray-900">{{ $pangkat->nama}}</p>
                            </div>
                        </div>
                        @endforeach
                        @empty
                        <div class="group relative">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $pegawai->nama }}
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $pegawai->nik }}</p>
                                </div>
                                <p class="text-sm font-medium text-gray-900">{{ $pangkat->nama}}</p>
                            </div>
                        </div>
                        @endforelse

                      </div>
                      {{ $pegawais->links() }}
                    </div>
                  </div>
            </div>
        </div>
    </div> --}}
    </div>
</x-app-layout>
