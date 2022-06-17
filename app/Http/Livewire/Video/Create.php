<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Create extends Component
{
    public $name = "Vídeo";
    public $comp = 'video';
    public Video $video;
    public $page_id;

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'video.page_id' => 'required',
        'video.embed' => 'required',
        'video.active' => 'nullable',
    ];

    protected $validationAttributes = [
        'video.page_id' => 'página',
        'video.embed' => 'código do youtube',
        'video.active' => 'ativo',
    ];

    public function mount()
    {
        $this->video = new Video();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function new()
    {
        $this->resetValidation();
        $this->video = new Video();
    }

    public function save()
    {
        $this->video->page_id = $this->page_id;
        $this->validate();
        $this->video->save();
    }

    public function render()
    {
        return view('livewire.video.form');
    }
}
