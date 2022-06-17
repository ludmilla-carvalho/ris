<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Página";
    public $comp = 'page';
    public Page $page;

    protected function rules()
    {
        return [
            'page.name' => 'required|string|min:3|max:255|unique:pages,name,' . $this->page->id,
            'page.order' => 'required|unique:pages,order,' . $this->page->id,
            'page.tit_seo' => 'nullable',
            'page.desc_seo' => 'nullable',
            'page.active' => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'page.name' => 'nome',
        'page.order' => 'ordem',
        'page.tit_seo' => 'SEO - título',
        'page.desc_seo' => 'SEO - descrição',
        'page.active' => 'ativo',
    ];

    public function mount($page)
    {
        //$this->page = $page;
        $this->page = Page::find($page->id);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->page->update($this->page->toArray());
    }

    public function render()
    {
        return view('livewire.page.edit')->layout('layouts.admin');
    }
}
