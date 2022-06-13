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
        'region', 'place', 'services', 'active'
    ];

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    }
}
