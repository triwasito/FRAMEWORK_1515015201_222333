<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal_matakuliah extends Model
{
    protected $table ='jadwal_matakuliah';
    protected $fillable =['mahasiswa_id','ruangan_id','dosen_matakuliah_id'];
    
        public function mahasiswa(){
        return $this->belongsTo(mahasiswa::class);	
        }

        public function dosen_matakuliah(){
        return $this->belongsTo(dosen_matakuliah::class);	
        }

        public function ruangan(){
        return $this->belongsTo(ruangan::class);	
        }

        public function getNamaMhsAttribute()
        {
           return $this->mahasiswa->nama; 
        }

        public function NimAttribute()
        {
           return $this->mahasiswa->nim; 
        }

        public function getNamaDsnAttribute()
        {
           return $this->dosen_matakuliah->dosen->nama; 
        }

         public function getNipDsnAttribute()
        {
           return $this->dosen_matakuliah->dosen->nip; 
        }

         public function getMatkulDsnAttribute()
        {
           return $this->dosen_matakuliah->matakuliah->title; 
        }

         public function getTitleruanganAttribute()
        {
           return $this->ruangan->title; 
        }

         public function listDosenMatakuliah_MahasiswaDanRuangan()
        {
            $out=[];
            foreach ($this->all() as $jdwlMatkul) {
                # code...
                $out[$jdwlMatkul->id] ="{$jdwlMatkul->DosenMatakuliah->dosen->nama}
                {$jdwlMatkul->mahasiswa->nama}
                (Ruangan$jdwlMatkul->ruangan->title})";
            }
            return $out;
        }
}
