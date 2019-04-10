<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $guarded = ['id']; 

    public function inventaris(){
    	return $this->hasMany('App\inventaris');
    }
}
