<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    protected $table = 'sensor';

    protected $fillable = [
        'name', 'active'
    ];
}
