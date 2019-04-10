<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    
    protected $table = 'ruang';
    protected $guarded = ['id'];

    public function inventaris(){
    	return $this->hasMany('App\inventaris');
    }
}
