<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'region_id', 'place', 'services', 'active '
    ];

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }

    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda')->orderBy('title', 'ASC');
    }
}
