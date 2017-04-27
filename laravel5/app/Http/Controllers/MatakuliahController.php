<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\MataKuliah;
use App\Http\Requests\MatakuliahRequest;

class MataKuliahController extends Controller
{
     public function awal()
    {
      return view('matakuliah.awal', ['data'=>Matakuliah::all()]);
    }
    public function tambah()
    {
      return view('matakuliah.tambah');
    }
    public function simpan(MatakuliahRequest $input)
    {
      $matakuliah = new MataKuliah;
      $matakuliah->title = $input->title;
        $matakuliah->keterangan = $input->keterangan;
        $informasi = $matakuliah->save() ? 'Berhasil simpan data' : 'Gagal simpan data';
      return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }
    public function edit($id)
    {
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.edit')->with(array('matakuliah'=>$matakuliah));
    }
    public function lihat($id)
    {
        $matakuliah = Matakuliah::find($id);
        return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
    }
    public function update($id, MatakuliahRequest $input)
    {
        $matakuliah = Matakuliah::find($id);
        $matakuliah->title = $input->title;
        $matakuliah->keterangan = $input->keterangan;
        $informasi = $matakuliah->save() ? 'Berhasil update data' : 'Gagal update data';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }
    public function hapus($id)
    {
        $matakuliah = Matakuliah::find($id);
        $informasi = $matakuliah->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }
}

