<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Region::class;
    public $name = "Região";
    public $comp = 'region';

    protected $listeners = ['refreshRegion' => 'refreshTable'];

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('title')
                ->label('Região')
                ->searchable(),

            Column::callback(['id', 'active'], function ($id, $active) {
                return view('admin.regions.table-active', ['id' => $id, 'active' => $active]);
            })->unsortable()->label('Ativo'),

            DateColumn::name('created_at')
                ->label('Criado em'),

            Column::callback(['id', 'title'], function ($id, $title) {
                return view('admin.regions.table-actions', ['id' => $id, 'title' => $title]);
            })->unsortable()->label('Ações')
        ];
    }

    public function refreshTable()
    {
        $this->refreshLivewireDatatable();
    }
}
