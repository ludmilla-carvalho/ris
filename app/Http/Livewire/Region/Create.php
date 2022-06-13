<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;

class Create extends Component
{
    public $name = "Região";
    public $comp = 'region';
    public $open = false;
    public Region $region;

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'region.title' => 'required|string|min:3|max:255|unique:regions,title,null',
        'region.active' => 'nullable',
    ];

    protected $validationAttributes = [
        'region.title' => 'região',
        'region.active' => 'ativo',
    ];

    public function mount()
    {
        $this->region = new Region();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function new()
    {
        $this->resetValidation();
        $this->region = new Region();
        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        $this->region->save();
        $this->emit('refreshRegion'); //atualiza region datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.region.create');
    }
}
