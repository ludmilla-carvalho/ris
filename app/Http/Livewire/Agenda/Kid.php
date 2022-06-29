<?php

namespace App\Http\Livewire\Agenda;

use App\Models\Agenda;
use App\Models\Category;
use App\Models\Place;
use App\Models\Region;
use App\Models\Performer;
use Livewire\Component;
use Livewire\WithPagination;

class Kid extends Component
{
    use WithPagination;

    public $open = false;
    public $regions = [];
    public $region = null;
    public $places = [];
    public $categories = [];
    public $performers = [];
    public $letter = null;
    public $sorts = [];
    public $filters = array(
        'type' => null,
        'value' => null,
        'place' => null,
        'performer' => null
    );
    public $perPage = 11;

    public function setSearch($type = null, $value = null, $place = null, $performer = null)
    {
        if ($type != null) {
            $this->filters['type'] = $type;
            $this->filters['value'] = null;
            $this->filters['place'] = null;
            $this->filters['performer'] = null;
        }

        if ($value != null) {
            $this->filters['value'] = $value;
            $this->filters['performer'] = null;

            if ($this->filters['type'] == 'performer') {
                $this->letter = $value;
                $this->getPerformers($value);
            } else {
                $this->letter = null;
                $this->performers = [];
            }

            $this->runQueryBuilder();
        }

        if ($place != null) {
            $this->filters['place'] = $place;
        }

        if ($performer != null) {
            $this->filters['performer'] = $performer;
        }
    }

    public function mount()
    {
        $this->getPlaces();
        $this->getCategories();
    }

    protected function getRegions()
    {
        $this->regions = Region::whereRelation('places.agendas', 'category_id', '=', 6)->pluck('title', 'id');
    }

    protected function getPlaces()
    {
        $this->places = Place::whereRelation('agendas', 'category_id', '=', 6)
            //->whereRelation('region', 'title', $region)
            ->pluck('title', 'id');
    }

    protected function getCategories()
    {
        $this->categories = Category::has('agendas')->get();
    }

    protected function getPerformers($letter = null)
    {
        $this->performers = Performer::whereRelation('agendas', 'category_id', '=', 6)
            ->where('name', 'like', $letter . '%')
            ->pluck('name', 'id');
    }

    public function applySorting($query)
    {
        foreach ($this->sorts as $column => $direction) {
            $query->orderBy($column, $direction);
        }
        return $query;
    }

    // hook lifecicle
    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function runQueryBuilder()
    {
        $filt = $this->filters;
        $query = Agenda::where('category_id', '=', 6)
            ->where('active', 1)
            ->orderBy('date', 'asc');

        if ($this->filters['type'] == 'performer') {
            if ($this->filters['value']) {
                $query = $query->whereRelation('performers', 'name', 'like', $this->filters['value'] . '%');
            }
            if ($this->filters['performer']) {
                $query = $query->whereRelation('performers', 'name', '=', $this->filters['performer']);
            }
        }

        if ($this->filters['type'] == 'region') {
            // if ($this->filters['value']) {
            //     $query = $query->whereRelation('place.region', 'title', '=', $this->filters['value']);
            // }
            if ($this->filters['value']) {
                $query = $query->whereRelation('place', 'title', '=', $this->filters['value']);
            }
        }

        if ($this->filters['type'] == 'category') {
            if ($this->filters['value']) {
                $query = $query->whereRelation('category', 'name', '=', $this->filters['value']);
            }
        }

        if ($this->filters['type'] == 'date') {
            if ($this->filters['value']) {
                $query = $query->where('date', 'like', '2022-07-' . $this->filters['value'] . ' %');
            }
        }
        return $query;
    }

    public function paginationView()
    {
        return 'components.pagination';
    }

    public function render()
    {
        return view('livewire.agenda.kid', [
            "items" => $this->runQueryBuilder()->paginate($this->perPage),
        ]);
    }
}
