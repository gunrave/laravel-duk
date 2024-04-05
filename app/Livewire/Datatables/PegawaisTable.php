<?php

namespace App\Livewire\Datatables;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Arm092\LivewireDatatables\Livewire\LivewireDatatable;
use Arm092\LivewireDatatables\Column;
use Arm092\LivewireDatatables\NumberColumn;
use Illuminate\Database\Eloquent\Builder;

class PegawaisTable extends LivewireDatatable
{
    public $model = Pegawai::class;

    public function builder(): Builder
    {
        return Pegawai::query();
    }

    public function columns()
    {
        return [
            Column::checkbox(),

            NumberColumn::name('id')
                ->label('ID')
                ->filterable(),

            Column::name('nama')
                ->label('Nama')
                ->filterable()->alignRight(),
        ];

    }
}
