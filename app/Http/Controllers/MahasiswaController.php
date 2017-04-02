<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\mahasiswa;

class MahasiswaController extends Controller
{
   public function awal()
 {
        return view('mahasiswa.awal',['data'=>mahasiswa::all()]);
    }

    public function tambah()
    {
        return view('mahasiswa.tambah');
    }

    public function simpan(Request $input)
    {
        $mahasiswa = new mahasiswa();
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        $mahasiswa->pengguna_id = $input->pengguna_id;
        
        
        $informasi =$mahasiswa->save() ? 'Berhasil simpan data' :'Gagal simpan data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }

    public function edit($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function lihat($id)
    {
        $mahasiswa = mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function update($id,Request $input)
    {
        $mahasiswa = mahasiswa::find($id);
        $mahasiswa->nama = $input->nama;
        $mahasiswa->nim = $input->nim;
        $mahasiswa->alamat = $input->alamat;
        $informasi = $mahasiswa->save() ? 'Berhasil Update data ' : 'Gagal Update data';
        return redirect('mahasiswa')->with(['Informasi'=>$informasi]); 
    }

    public function hapus($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $informasi = $mahasiswa->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('mahasiswa')->with(['informasi'=>$informasi]);
    }
}
