<?php

namespace App\Http\Livewire\Performer;

use App\Models\Performer;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;

    public $name = "Artista";
    public $comp = 'performer';
    public $open = false;
    public $image;
    public $iteration = 0;
    public Performer $performer;

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'performer.name' => 'required|string|min:3|max:255|unique:performers,name,null',
        'performer.bio' => 'bio',
        'image' => 'required|mimes:png,jpg,jpeg,gif|file|max:2048',
    ];

    protected $validationAttributes = [
        'performer.name' => 'nome',
        'performer.bio' => 'bio',
        'image' => 'imagem',
    ];

    public function mount()
    {
        $this->performer = new Performer();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function new()
    {
        $this->resetValidation();
        $this->performer = new Performer();
        $this->image = null;
        $this->iteration++;
        $this->open = true;
    }

    public function save()
    {
        $this->validate();
        $this->performer->slug = Str::slug($this->performer->name, '-');
        if ($this->image) {
            $dir_file = storage_path() . '/app/public/performers/';
            //Cria o diretório, casa ele não existe
            if (!is_dir($dir_file)) {
                mkdir($dir_file, 0777, true);
            }
            $this->performer->image = $this->performer->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('performers/', $this->performer->image, 'public');
        }
        $this->performer->save();
        $this->emit('refreshPerformer'); //atualiza performer datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.performer.create');
    }
}
