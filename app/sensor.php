<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    protected $table = 'sensor';
    public $timestamps = false;

    protected $fillable = [
        'name', 'active', 'home_id'
    ];
}
