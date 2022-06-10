<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataTable extends LivewireDatatable
{
    public $model = User::class;
    public $name = "Administrador";
    public $comp = 'user';

    protected $listeners = ['refreshUser' => 'refreshTable'];

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

            Column::name('email')
                ->label('E-mail')
                ->searchable(),

            DateColumn::name('created_at')
                ->label('Criado em'),

            Column::callback(['id', 'name'], function ($id, $name) {
                return view('admin.users.table-actions', ['id' => $id, 'name' => $name]);
            })->unsortable()->label('Ações')
        ];
    }

    public function refreshTable()
    {
        $this->refreshLivewireDatatable();
    }
}
