<?php

namespace App\Http\Livewire\Performer;

use Livewire\Component;

class Index extends Component
{
    public $open = false;
    public function render()
    {
        return view('livewire.performer.index')->layout('layouts.admin');
    }
}
