<?php

namespace App\Livewire;

use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class PegawaiTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(mode:'full'),
        ];
    }

    public function datasource(): Builder
    {
        return Pegawai::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('nik')

           /** Example of custom column using a closure **/
            ->addColumn('nik_lower', fn (Pegawai $model) => strtolower(e($model->nik)))
            ->addColumn('nama', function(Pegawai $model){
                return '<p>'.$model->nama
                    .'</p><p>'. $model->nik
                    .'</p><p>'. $model->pangkats->pluck('nama')->implode(', ') .' '. $model->pangkats->pluck('golongan')->implode(', ')
                    .'</p><p>'. $model->jabatan;
            });
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),

            Column::make('Nama Pegawai', 'nama')
                ->sortable()
                ->searchable()
                ->withCount('Count', true, false),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('nik')->operators(['contains']),
            Filter::inputText('nama')->operators(['contains']),
            Filter::inputText('jabatan')->operators(['contains']),
            Filter::datepicker('tmt_jabatan'),
            Filter::inputText('eselon')->operators(['contains']),
            Filter::inputText('bagian_wilayah')->operators(['contains']),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Pegawai $row): array
    {
        return [
            Button::add('Tambah Gaji')
                ->slot('Gaji')
                ->id()
                ->class('pg-btn-white dark:ring-pg-warning-600 dark:border-pg-warning-600 dark:hover:bg-pg-warning-700 dark:ring-offset-pg-warning-800 dark:text-pg-warning-300 dark:bg-pg-warning-700')
                ->dispatch('edit', ['rowId' => $row->id]),

            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-warning-600 dark:border-pg-warning-600 dark:hover:bg-pg-warning-700 dark:ring-offset-pg-warning-800 dark:text-pg-warning-300 dark:bg-pg-warning-700')
                ->dispatch('edit', ['rowId' => $row->id]),

            Button::add('Delete')
                ->slot('Delete')
                ->id()
                ->class('inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150')
                ->dispatch('edit', ['rowId' => $row->id]),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('new-pegawai')
                ->slot('Tambah Pegawai')
                ->class('bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded')
                // ->method('get')
                ->route('pegawais.create', ['pegawai' => 'id']),
        ];
    }
    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
