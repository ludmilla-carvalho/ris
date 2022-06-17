<?php

namespace App\Http\Livewire\Text;

use App\Models\Text;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Texto";
    public $comp = 'text';
    public Text $text;

    protected $listeners = [
        'show' => 'show',
    ];

    protected function rules()
    {
        return [
            'text.page_id' => 'required',
            'text.text' => 'required',
            'text.active' => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'text.page_id' => 'página',
        'text.text' => 'Texto',
        'text.active' => 'ativo',
    ];

    public function mount()
    {
        //$this->text = new Text();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->text->update($this->text->toArray());
    }

    public function render()
    {
        return view('livewire.text.form');
    }
}
