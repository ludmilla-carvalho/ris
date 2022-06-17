<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class Edit extends Component
{
    public $name = "Vídeo";
    public $comp = 'video';
    public Video $video;

    protected $listeners = [
        'show' => 'show',
    ];

    protected function rules()
    {
        return [
            'video.page_id' => 'required',
            'video.embed' => 'required',
            'video.active' => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'video.page_id' => 'página',
        'video.embed' => 'código do youtube',
        'video.active' => 'ativo',
    ];

    public function mount()
    {
        //$this->video = new Video();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->video->update($this->video->toArray());
    }

    public function render()
    {
        return view('livewire.video.form');
    }
}
