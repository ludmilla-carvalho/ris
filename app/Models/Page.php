<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'order', 'active', 'tit_seo', 'desc_seo'
    ];

    public function video()
    {
        return $this->hasOne('App\Models\Video');
    }

    public function text()
    {
        return $this->hasOne('App\Models\Text');
    }
}
