<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $guarded = ['id']; 

    public function petugas(){
    	return $this->hasMany('App\Petugas');
    }
}
