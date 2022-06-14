<?php

namespace App\Http\Livewire\Performer;

use App\Models\Performer;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $name = "Artista";
    public $comp = 'performer';
    public $open = false;
    public $image;
    public $iteration = 0;
    public Performer $performer;
    public $performer_id = null;

    protected $listeners = [
        'show' => 'show',
    ];

    protected function rules()
    {
        return [
            'performer.name' => 'required|string|min:3|max:255|unique:performers,name,' . $this->performer->id,
            'performer.bio' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|file|max:2048',
        ];
    }

    protected $validationAttributes = [
        'performer.name' => 'name',
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

    public function show($id)
    {
        $this->resetValidation();
        $this->performer = Performer::find($id);
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

            //Apaga a imagem antiga
            if (strlen($this->performer->image) > 3) {
                Storage::delete('public/performers/' . $this->performer->image);
            }
            $this->performer->image = $this->performer->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('performers/', $this->performer->image, 'public');
        }
        $this->performer->update($this->performer->toArray());
        $this->emit('refreshPerformer'); //atualiza performer datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.performer.edit');
    }
}
