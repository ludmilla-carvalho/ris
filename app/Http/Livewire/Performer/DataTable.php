<?php

namespace App\Http\Livewire\Performer;

use App\Models\Performer;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = Performer::class;
    public $name = "Artista";
    public $comp = 'performer';

    protected $listeners = ['refreshPerformer' => 'refreshTable'];

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id'),

            Column::name('name')
                ->label('Nome')
                ->searchable(),

            Column::callback(['image'], function ($image) {
                if (strlen($image) > 3) {
                    return '<a href="' . url("storage/performers/$image") . '" target="_blank"><img src="' . url("storage/performers/$image") . '" class="w-20"></a>';
                }
                //return "<span class='font-bold'>$title</span>";
            })
                ->label('Imagem'),

            DateColumn::name('created_at')
                ->label('Criado em'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('admin.performers.table-actions', ['id' => $id, 'title' => $name]);
            })->unsortable()->label('Ações')
        ];
    }

    public function refreshTable()
    {
        $this->refreshLivewireDatatable();
    }
}
