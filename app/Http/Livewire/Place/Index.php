<?php

namespace App\Http\Livewire\Place;

use Livewire\Component;

class Index extends Component
{
    public $val = 'add';
    public $open = false;
    public function render()
    {
        return view('livewire.place.index')->layout('layouts.admin');
    }
}
