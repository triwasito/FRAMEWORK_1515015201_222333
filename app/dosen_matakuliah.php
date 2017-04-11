<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dosen_matakuliah extends Model
{
    protected $table ='dosen_matakuliah';
    protected $fillable =['dosen_id','matakuliah_id'];

    public function dosen(){
    	return $this->belongsTo(dosen::class);
    }

    public function matakuliah(){
    return $this->belongsTo(matakuliah::class);	
    }

    public function jadwal_matakuliah(){
    return $this->hasMany(jadwal_matakuliah::class,'dosen_matakuliah_id');	
    }

    public function getNamaAttribute()
    {
        return $this->dosen->nama;    
    }

    public function getNipAttribute()
    {
        return $this->dosen->nip;    
    }

    public function getTitleMatkulAttribute()
    {
        return $this->matakuliah->title;    
    }

    public function listDosenDanMatakuliah()
    {
        $out=[];
        foreach ($this->all() as $dsnMtk) {
            # code...
            $out[$dsnMtk->id]="{dsnMtk->dosen->nama} {dsnMtk-dosen->nip} (Matakuliah{$dsnMtk->matakuliah->title})";
        }
        return $out;
    }
}
 