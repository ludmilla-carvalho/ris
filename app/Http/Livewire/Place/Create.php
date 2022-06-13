<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use App\Models\Region;
use Livewire\Component;

class Create extends Component
{
    public $name = "Local";
    public $comp = 'place';
    public $regions;
    public $open = false;
    public Place $place;

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'place.title' => 'required|string|min:3|max:255|unique:places,title,null',
        'place.region_id' => 'required',
        'place.services' => 'required',
        'place.active' => 'nullable',
    ];

    protected $validationAttributes = [
        'place.title' => 'local',
        'place.region_id' => 'região',
        'place.service' => 'serviço',
        'place.active' => 'ativo',
    ];

    public function mount()
    {
        $this->place = new Place();
        $this->regions = $this->getRegionsProperty();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function getRegionsProperty()
    {
        return Region::all()->pluck('title');
    }

    public function new()
    {
        $this->resetValidation();
        $this->place = new Place();
        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        $this->place->save();
        $this->emit('refreshPlace'); //atualiza place datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.place.create');
    }
}
