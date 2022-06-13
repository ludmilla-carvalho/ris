<?php

namespace App\Http\Livewire\Region;

use App\Models\Region;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Região";
    public $comp = 'region';
    public $open = false;
    public Region $region;
    public $region_id = null;

    protected $listeners = [
        'show' => 'show',
        'toogleActive' => 'toogleActive',
    ];

    protected function rules()
    {
        return [
            'region.title' => 'required|string|min:3|max:255|unique:regions,title,' . $this->region->id,
            'region.active' => 'nullable',
        ];
    }

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

    public function show($id)
    {
        $this->resetValidation();
        $this->region = Region::find($id);
        $this->open = true;
    }

    public function toogleActive($id)
    {
        $this->region = Region::find($id);
        if ($this->region->active == 1) {
            $this->region->active = 0;
        } else {
            $this->region->active = 1;
        }
        $this->region->save();
        //$this->emitUp('refreshRegion');
        $this->emit('refreshRegion');
    }

    public function save()
    {
        $this->validate();
        $this->region->update($this->region->toArray());
        $this->emit('refreshRegion'); //atualiza region datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.region.edit');
    }
}
