<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             Edit Rincian Gaji Pokok {{ date('F Y', strtotime($gapegs->bulan_tahun)) }}
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
                                <input type="hidden" name="gapok" value="{{ $gapegs->id }}">
                            </div>
                        </div>

                        <div class="flex mt-4">
                            <x-button>
                                {{ __('Edit Detail Gaji Pokok') }}
                            </x-button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
