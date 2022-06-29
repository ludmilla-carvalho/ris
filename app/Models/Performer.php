<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'bio', 'image'
    ];

    public function agendas()
    {
        return $this->belongsToMany('App\Models\Agenda')->orderBy('title', 'ASC');
    }
}
