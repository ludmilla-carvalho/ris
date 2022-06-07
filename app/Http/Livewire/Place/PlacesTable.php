<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PlacesTable extends LivewireDatatable
{
    public $model = Place::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('region')
                ->label('Região'),

            Column::name('place')
                ->label('Local'),

            Column::name('services')
                ->label('Serviços'),

            DateColumn::name('created_at')
                ->label('Criado em')
        ];
    }
}
