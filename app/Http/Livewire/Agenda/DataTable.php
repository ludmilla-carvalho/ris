<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use App\Models\Category;
use App\Models\Place;
use App\Models\Performer;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Agenda::class;
    public $name = "Agenda";
    public $comp = 'agenda';

    protected $listeners = ['refreshAgenda' => 'refreshTable'];

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('title')
                ->label('Título')
                ->searchable(),

            Column::callback(['image'], function ($image) {
                if (strlen($image) > 3) {
                    return '<a href="' . url("storage/agendas/$image") . '" target="_blank"><img src="' . url("storage/agendas/$image") . '" class="w-20"></a>';
                }
            })
                ->label('Imagem'),

            Column::callback(['date'], function ($date) {
                return \Carbon\Carbon::parse($date)->format('d/m/Y H:i');
            })
                ->label('Data'),

            Column::name('category.name')
                ->label('Categoria')
                ->filterable($this->category),

            Column::name('place.title')
                ->label('Local')
                ->filterable($this->place),

            Column::name('performers.name')
                ->filterable($this->performers)
                ->label('Artistas'),

            Column::callback(['id', 'active'], function ($id, $active) {
                return view('admin.agendas.table-active', ['id' => $id, 'active' => $active]);
            })->label('Ativo'),

            Column::callback(['id', 'destaque'], function ($id, $destaque) {
                return view('admin.agendas.table-destaque', ['id' => $id, 'destaque' => $destaque]);
            })->label('Destaque'),

            DateColumn::name('created_at')
                ->label('Criado em'),

            Column::callback(['id', 'title'], function ($id, $title) {
                return view('admin.agendas.table-actions', ['id' => $id, 'title' => $title]);
            })->unsortable()->label('Ações')
        ];
    }

    public function refreshTable()
    {
        $this->refreshLivewireDatatable();
    }

    public function getCategoryProperty()
    {
        return Category::orderBy('name')->pluck('name');
    }

    public function getPlaceProperty()
    {
        return Place::orderBy('title')->pluck('title');
    }

    public function getPerformersProperty()
    {
        return Performer::orderBy('name')->pluck('name');
    }
}
