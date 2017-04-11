<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table ='dosen';
    protected $fillable =['nama','nip','alamat','pengguna_id'];
    protected $guarded=['id'];
    
    public function pengguna(){
    return $this->belongsTo(Pengguna::class);
	}

	public function dosen_matakuliah(){
	return $this->hasMany(dosen_matakuliah::class,'dosen_id');	

	}

	public function getUsernameAttribute()
	{
		return $this->pengguna->username;
	}

	public function listDosendanNip()
	{
		$out=[];
		foreach ($this->all() as $dsn) {
		$out[$dsn->id]="{$dsn->nama} ({$dsn->nip})";
			# code...
		}
		return $out;
	}


}
