<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_id', 'text', 'active',
    ];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }
}
