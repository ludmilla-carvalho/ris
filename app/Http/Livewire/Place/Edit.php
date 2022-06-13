<?php

namespace App\Http\Livewire\Place;

use App\Models\Place;
use App\Models\Region;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Local";
    public $comp = 'place';
    public $regions;
    public $open = false;
    public Place $place;
    public $place_id = null;

    protected $listeners = [
        'show' => 'show',
        'toogleActive' => 'toogleActive',
    ];

    protected function rules()
    {
        return [
            'place.title' => 'required|string|min:3|max:255|unique:places,title,' . $this->place->id,
            'place.region_id' => 'required',
            'place.services' => 'required',
            'place.active' => 'nullable',
        ];
    }

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

    public function show($id)
    {
        $this->resetValidation();
        $this->place = Place::find($id);
        $this->open = true;
    }

    public function toogleActive($id)
    {
        $this->place = Place::find($id);
        if ($this->place->active == 1) {
            $this->place->active = 0;
        } else {
            $this->place->active = 1;
        }
        $this->place->save();
        $this->emit('refreshPlace');
    }


    public function save()
    {
        $this->validate();
        $this->place->update($this->place->toArray());
        $this->emit('refreshPlace'); //atualiza place datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.place.edit');
    }
}
