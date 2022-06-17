<?php

namespace App\Http\Livewire\Text;

use App\Models\Text;
use Livewire\Component;

class Create extends Component
{
    public $name = "Texto";
    public $comp = 'text';
    public Text $text;
    public $page_id;

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'text.page_id' => 'required',
        'text.text' => 'required',
        'text.active' => 'nullable',
    ];

    protected $validationAttributes = [
        'text.page_id' => 'página',
        'text.text' => 'texto',
        'text.active' => 'ativo',
    ];

    public function mount()
    {
        $this->text = new Text();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function new()
    {
        $this->resetValidation();
        $this->text = new Text();
    }

    public function save()
    {
        $this->text->page_id = $this->page_id;
        $this->validate();
        $this->text->save();
    }

    public function render()
    {
        return view('livewire.text.form');
    }
}
