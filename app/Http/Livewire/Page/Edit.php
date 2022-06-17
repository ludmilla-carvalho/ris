<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Página";
    public $comp = 'page';
    //public $open = false;
    public Page $page;
    //public $page_id = null;

    protected $listeners = [
        //'show' => 'show',
        //'toogleActive' => 'toogleActive',
    ];

    protected function rules()
    {
        return [
            'page.title' => 'required|string|min:3|max:255|unique:pages,title,' . $this->page->id,
            'page.active' => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'page.title' => 'região',
        'page.active' => 'ativo',
    ];

    public function mount()
    {
        //$this->page = new Page();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function show($id)
    {
        /*$this->resetValidation();
        $this->page = Page::find($id);
        $this->open = true;*/
    }

    public function save()
    {
        /*$this->validate();
        $this->page->update($this->page->toArray());
        $this->emit('refreshPage'); //atualiza page datatable
        $this->open = false;*/
    }

    public function render()
    {
        return view('livewire.page.edit');
    }
}
