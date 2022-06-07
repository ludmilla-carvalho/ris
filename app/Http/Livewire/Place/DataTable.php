<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Place::class;
    public $name = "Local";
    //public $cNamePl = "Locais";
    public $comp = 'place';

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('region')
                ->label('Região'),

            Column::callback(['place'], function ($place) {
                return "<span class='font-bold'>$place</span>";
            })
                ->label('Local')
                ->searchable(),

            // Column::name('place')
            //     ->label('Local')
            //     ->searchable(),

            Column::name('services')
                ->label('Serviços')
                ->unsortable(),

            DateColumn::name('created_at')
                ->label('Criado em'),

            Column::callback(['id', 'place'], function ($id, $place) {
                return view('admin.places.table-actions', ['id' => $id, 'place' => $place]);
            })->unsortable()->label('Ações')
        ];
    }
}
