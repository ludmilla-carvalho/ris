<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Index extends Component
{
    //public $open = false;
    public function render()
    {
        return view('livewire.user.index')->layout('layouts.admin');
    }
}
