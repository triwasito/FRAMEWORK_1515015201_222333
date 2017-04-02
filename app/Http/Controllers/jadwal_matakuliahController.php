<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\jadwal_matakuliah;
class jadwal_matakuliahController extends Controller
{
    public function awal()
    {
        return view('jadwal_matakuliah.awal',['data'=>jadwal_matakuliah::all()]);
    }

    public function tambah()
    {
        return view('jadwal_matakuliah.tambah');
    }

    public function simpan(Request $input)
    {
        $jadwal_matakuliah = new jadwal_matakuliah();
        $jadwal_matakuliah->nama = $input->nama;
        $jadwal_matakuliah->nip = $input->nip;
        $jadwal_matakuliah->alamat = $input->alamat;
        $jadwal_matakuliah->pengguna_id = $input->pengguna_id;
        
        
        $informasi =$jadwal_matakuliah->save() ? 'Berhasil simpan data' :'Gagal simpan data';
        return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
    }

    public function edit($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.edit')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }

    public function lihat($id)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
        return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }

    public function update($id,Request $input)
    {
        $jadwal_matakuliah = jadwal_matakuliah::find($id);
         $jadwal_matakuliah->nama = $input->nama;
        $jadwal_matakuliah->nip = $input->nip;
        $jadwal_matakuliah->alamat = $input->alamat;
        $informasi = $jadwal_matakuliah->save() ? 'Berhasil Update data ' : 'Gagal Update data';
        return redirect('jadwal_matakuliah')->with(['Informasi'=>$informasi]); 
    }

    public function hapus($id)
    {
        $dosen = dosen::find($id);
        $informasi = $dosen->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('dosen')->with(['informasi'=>$informasi]);
    }
}


