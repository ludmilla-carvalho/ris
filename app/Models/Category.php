<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    public function agendas()
    {
        return $this->hasMany('App\Models\Agenda')->orderBy('title', 'ASC');
    }
}
