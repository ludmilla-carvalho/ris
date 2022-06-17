<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use App\Models\Region;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Place::class;
    public $name = "Local";
    public $comp = 'place';

    //public $complex = true;

    protected $listeners = ['refreshPlace' => 'refreshTable'];

    // public function builder()
    // {
    //     return Place::query()->leftJoin('region');
    // }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('region.title')
                ->label('Região')
                ->filterable($this->regions),

            Column::callback(['title'], function ($title) {
                return "<span class='font-bold'>$title</span>";
            })
                 ->label('Local')
                ->searchable(),

            Column::name('services')
                ->label('Serviços')
                ->unsortable(),

            Column::callback(['id', 'active'], function ($id, $active) {
                return view('admin.places.table-active', ['id' => $id, 'active' => $active]);
            })->label('Ativo'),

            DateColumn::name('created_at')
                ->label('Criado em'),

            Column::callback(['id', 'title'], function ($id, $title) {
                return view('admin.places.table-actions', ['id' => $id, 'title' => $title]);
            })->unsortable()->label('Ações')
        ];
    }

    public function getRegionsProperty()
    {
        return Region::pluck('title');
    }

    public function refreshTable()
    {
        $this->refreshLivewireDatatable();
    }
}
