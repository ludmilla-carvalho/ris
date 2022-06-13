<?php

namespace App\Http\Livewire\Region;

use Livewire\Component;

class Index extends Component
{
    public $val = 'add';
    public $open = false;
    public function render()
    {
        return view('livewire.region.index')->layout('layouts.admin');
    }
}
