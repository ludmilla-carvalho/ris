<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use App\Models\Category;
use App\Models\Performer;
use App\Models\Place;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
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

    protected $listeners = [
        'new' => 'new',
    ];

    protected $rules = [
        'agenda.title' => 'required|string|min:3|max:255|unique:agendas,title,null',
        'agenda.info' => 'nullable',
        'agenda.date' => 'required',
        'agenda.destaque' => 'nullable',
        'agenda.pago' => 'nullable',
        'agenda.active' => 'nullable',
        'agenda.link_pago' => 'nullable',
        'agenda.category_id' => 'required',
        'agenda.place_id' => 'required',
        'agenda.info' => 'nullable',
        'image' => 'required|mimes:png,jpg,jpeg,gif|file|max:2048',
        'banner' => 'nullable|mimes:png,jpg,jpeg,gif|file|max:2048',
        'banner_mobile' => 'nullable|mimes:png,jpg,jpeg,gif|file|max:2048',
        'selPerformers' => 'nullable',
    ];

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

    public function new()
    {
        $this->resetValidation();
        $this->agenda = new Agenda();
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
            $this->agenda->image = $this->agenda->slug . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('agendas/', $this->agenda->image, 'public');
        }

        if ($this->banner) {
            $dir_file = storage_path() . '/app/public/agendas/';
            //Cria o diretório, casa ele não existe
            if (!is_dir($dir_file)) {
                mkdir($dir_file, 0777, true);
            }
            $this->agenda->banner = $this->agenda->slug . '_b.' . $this->banner->getClientOriginalExtension();
            $this->banner->storeAs('agendas/', $this->agenda->banner, 'public');
        }

        if ($this->banner_mobile) {
            $dir_file = storage_path() . '/app/public/agendas/';
            //Cria o diretório, casa ele não existe
            if (!is_dir($dir_file)) {
                mkdir($dir_file, 0777, true);
            }
            $this->agenda->banner_mobile = $this->agenda->slug . '_bm.' . $this->banner_mobile->getClientOriginalExtension();
            $this->banner_mobile->storeAs('agendas/', $this->agenda->banner_mobile, 'public');
        }

        $this->agenda->save();
        $this->agenda->performers()->sync($this->selPerformers);
        $this->emit('refreshAgenda'); //atualiza agenda datatable
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.agenda.create');
    }
}
