<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';
    protected $guarded = ['id'];

    public function jenis(){
    	return $this->belongsTo('App\Jenis', 'id_jenis');
    }

    public function ruang(){
    	return $this->belongsTo('App\Ruang', 'id_ruang');
    }

    public function petugas(){
    	return $this->belongsTo('App\Petugas', 'id_petugas');
    }
}
