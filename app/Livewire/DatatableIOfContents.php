<?php

namespace App\Livewire;

use App\Models\Pegawai;
use Arm092\LivewireDatatables\Column;
use Arm092\LivewireDatatables\DateColumn;
use Arm092\LivewireDatatables\NumberColumn;
use Livewire\Component;
use Illuminate\Support\Str;

class DatatableIOfContents extends Component
{

    public $model = Pegawai::class;

    public function columns()
    {
        return [

            NumberColumn::name('id')
                ->label('ID')
                ->sortBy('id'),

            Column::name('nama')
                ->label('Nama Pegawai'),

            Column::name('jabatan'),

            DateColumn::name('created_at')
                ->label('Creation Date'),
        ];
    }

    // public function render()
    // {
    //     return view('livewire.datatable-i-of-contents');
    // }
}
