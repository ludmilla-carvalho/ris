<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destaque', 'pago', 'active', 'link_pago', 'category_id', 'title', 'slug', 'place_id', 'date', 'info', 'image', 'banner', 'banner_mobile',
    ];

    public function place()
    {
        return $this->belongsTo('App\Models\Place')->orderBy('title', 'ASC');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category')->orderBy('title', 'ASC');
    }

    public function performers()
    {
        return $this->belongsToMany('App\Models\Performer', 'agenda_performer', 'agenda_id', 'performer_id');//->orderBy('name', 'ASC')
    }
}
