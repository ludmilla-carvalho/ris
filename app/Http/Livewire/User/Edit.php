<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $name = "Administrador";
    public $comp = 'user';
    public $regions;
    public $open = false;
    public User $user;
    public $user_id = null;

    protected $listeners = [
        'show' => 'show',
    ];

    protected function rules()
    {
        return [
            'user.name' => 'required|string|min:3|max:255',
            'user.email' => 'required|string|email|min:3|max:255|unique:users,email,' . $this->user->id,
            'user.password' => 'nullable|string|min:8|max:225',
        ];
    }

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

    public function show($id)
    {
        $this->resetValidation();
        $this->user = User::find($id);
        $this->user->password = '';
        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        if (strlen($this->user->password) > 5) {
            $this->user->password = Hash::make($this->user->password);
        } else {
            unset($this->user->password);
        }
        $this->user->update($this->user->toArray());
        $this->emit('refreshUser'); //atualiza user datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
