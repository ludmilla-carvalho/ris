<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    public function places()
    {
        return $this->hasMany('App\Models\Place')->orderBy('title', 'ASC');
    }
}
