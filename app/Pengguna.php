<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $fillable = ['Username','Password'];

	public function dosen(){
	return $this->hasOne(dosen::class,'pengguna_id');
	

}    

public function mahasiswa(){
	return $this->hasOne(Mahasiswa::class,'pengguna_id');
}

}
