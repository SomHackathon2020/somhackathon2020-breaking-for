<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use Notifiable;
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user1_id', 'user2_id', 'token_home'
    ];

    protected $table = 'home';

    public function user1(){
        return $this->belongsTo(User::class);
    }

    public function user2(){
        return $this->belongsTo(User::class);
    }

    public function recordatoris(){
        return $this->hasMany(Recordatori::class);
    }

    public function sensor(){
        return $this->hasMany(Sensor::class);
    }
}
