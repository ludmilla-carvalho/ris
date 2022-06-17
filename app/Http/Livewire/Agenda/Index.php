<?php

namespace App\Http\Livewire\Agenda;

use Livewire\Component;

class Index extends Component
{
    public $open = false;
    public function render()
    {
        return view('livewire.agenda.index')->layout('layouts.admin');
    }
}
