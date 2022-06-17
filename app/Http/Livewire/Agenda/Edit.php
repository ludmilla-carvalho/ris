<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use App\Models\Category;
use App\Models\Performer;
use App\Models\Place;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $name = "Agenda";
    public $comp = 'agenda';
    public $open = false;
    public $image;
    public $banner;
    public $banner_mobile;
    public $categories = [];
    public $places = [];
    public $performers = [];
    public $selPerformers = [];
    public $iteration = 0;
    public Agenda $agenda;
    public $agenda_id = null;

    protected $listeners = [
        'show' => 'show',
        'toogleActive' => 'toogleActive',
        'toogleDestaque' => 'toogleDestaque',
    ];

    protected function rules()
    {
        return [
            //'agenda.title' => 'required|string|min:3|max:255|unique:agendas,title,' . $this->agenda->id,
            'agenda.title' => 'required|string|min:3|max:255',
            'agenda.info' => 'nullable',
            'agenda.date' => 'required',
            'agenda.destaque' => 'nullable',
            'agenda.pago' => 'nullable',
            'agenda.active' => 'nullable',
            'agenda.link_pago' => 'nullable',
            'agenda.category_id' => 'required',
            'agenda.place_id' => 'required',
            'agenda.info' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|file|max:2048',
            'banner' => 'nullable|mimes:png,jpg,jpeg,gif|file|max:2048',
            'banner_mobile' => 'nullable|mimes:png,jpg,jpeg,gif|file|max:2048',
            'selPerformers' => 'nullable',
        ];
    }

    protected $validationAttributes = [
        'agenda.title' => 'título',
        'agenda.info' => 'info',
        'agenda.date' => 'data',
        'agenda.destaque' => 'destaque na home',
        'agenda.pago' => 'evento pago',
        'agenda.active' => 'ativo',
        'agenda.link_pago' => 'link para a compra',
        'agenda.category_id' => 'categoria',
        'agenda.place_id' => 'local',
        'image' => 'imagem',
        'banner' => 'banner',
        'banner_mobile' => 'banner mobile',
        'selPerformers' => 'artistas',
    ];

    public function mount()
    {
        $this->agenda = new Agenda();
        $this->getCategories();
        $this->getPerformers();
        $this->getPlaces();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function show($id)
    {
        $this->resetValidation();
        $this->agenda = Agenda::find($id);
        $this->image = null;
        $this->banner = null;
        $this->banner_mobile = null;
        $this->iteration++;
        $this->clearPerformers();
        $this->emit('clearPerformers');
        $this->open = true;
    }

    protected function getCategories()
    {
        $this->categories = Category::pluck('name', 'id');
    }

    protected function getPerformers()
    {
        $this->performers = Performer::pluck('name', 'id');
    }

    protected function getPlaces()
    {
        $this->places = Place::pluck('title', 'id');
    }

    protected function clearPerformers()
    {
        $this->selPerformers = [];
        foreach ($this->agenda->performers as $item) {
            $this->selPerformers[] = "$item->id";
        }
    }

    public function toogleActive($id)
    {
        $this->agenda = Agenda::find($id);
        if ($this->agenda->active == 1) {
            $this->agenda->active = 0;
        } else {
            $this->agenda->active = 1;
        }
        $this->agenda->save();
        $this->emit('refreshAgenda');
    }

    public function toogleDestaque($id)
    {
        $this->agenda = Agenda::find($id);
        if ($this->agenda->destaque == 1) {
            $this->agenda->destaque = 0;
        } else {
            $this->agenda->destaque = 1;
        }
        $this->agenda->save();
        $this->emit('refreshAgenda');
    }

    public function save()
    {
        $this->validate();
        $this->agenda->slug = Str::slug($this->agenda->title, '-');
        if ($this->image) {
            $dir_file = storage_path() . '/app/public/agendas/';
            //Cria o diretório, casa ele não existe
            if (!is_dir($dir_file)) {
                mkdir($dir_file, 0777, true);
            }
            //Apaga a imagem antiga
            if (strlen($this->agenda->image) > 3) {
                Storage::delete('public/agendas/' . $this->agenda->image);
            }
            $this->agenda->image = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('agendas/', $this->agenda->image, 'public');
        }

        if ($this->banner) {
            $dir_file = storage_path() . '/app/public/agendas/';
            //Cria o diretório, casa ele não existe
            if (!is_dir($dir_file)) {
                mkdir($dir_file, 0777, true);
            }
            //Apaga o banner antigo
            if (strlen($this->agenda->banner) > 3) {
                Storage::delete('public/agendas/' . $this->agenda->banner);
            }
            $this->agenda->banner = time() . '_b.' . $this->banner->getClientOriginalExtension();
            $this->banner->storeAs('agendas/', $this->agenda->banner, 'public');
        }

        if ($this->banner_mobile) {
            $dir_file = storage_path() . '/app/public/agendas/';
            //Cria o diretório, casa ele não existe
            if (!is_dir($dir_file)) {
                mkdir($dir_file, 0777, true);
            }
            //Apaga o banner_mobile antigo
            if (strlen($this->agenda->banner_mobile) > 3) {
                Storage::delete('public/agendas/' . $this->agenda->banner_mobile);
            }
            $this->agenda->banner_mobile = time() . '_bm.' . $this->banner_mobile->getClientOriginalExtension();
            $this->banner_mobile->storeAs('agendas/', $this->agenda->banner_mobile, 'public');
        }

        $this->agenda->update($this->agenda->toArray());
        $this->agenda->performers()->sync($this->selPerformers);
        $this->emit('refreshAgenda'); //atualiza agenda datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.agenda.edit');
    }
}
