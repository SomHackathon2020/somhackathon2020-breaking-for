<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Recordatori extends Model
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name','hora','home_id','activa',
    ];

    protected $table = 'recordatori';

    public function home(){
        return $this->belongsTo(Home::class);
    }
}
