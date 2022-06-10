<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $name = "Administrador";
    public $comp = 'user';
    public $regions;
    public $open = false;
    public User $user;

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'user.name' => 'required|string|min:3|max:255',
        'user.email' => 'required|string|email|min:3|max:255|unique:users,email,null',
        'user.password' => 'required|string|min:8|max:225',
    ];

    protected $validationAttributes = [
        'user.name' => 'nome',
        'user.email' => 'e-mail',
        'user.password' => 'senha',
    ];

    public function mount()
    {
        $this->user = new User();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function new()
    {
        $this->resetValidation();
        $this->user = new User();
        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        $this->user->password = Hash::make($this->user->password);
        $this->user->save();
        $this->emit('refreshUser'); //atualiza user datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.user.create');
    }
}
