<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;

class dosen_matakuliahController extends Controller
{
  public function awal()
   {
    return view('dosen_matakuliah.awal',['data'=>dosen_matakuliah::all()] );
   }
    public function tambah()
  {
    return view ('dosen_matakuliah.tambah');
  }

  public function simpan(Request $input)
  {
  $dosen_matakuliah = new dosen_matakuliah();
  $dosen_matakuliah->title = $input->title;
  $informasi = $dosen_matakuliah->save() ? 'Berhasil simpan data':'Gagal simpan data';
  return redirect ('dosen_matakuliah')->with (['informasi'=>$informasi]);
  }  
    public function edit ($id)
{
  $dosen_matakuliah = dosen_matakuliah::find($id);
  return view('dosen_matakuliah.edit')->with (array('dosen_matakuliah'=>$dosen_matakuliah));
}
public function lihat ($id)
{
  $dosen_matakuliah = dosen_matakuliah::find($id);
  return view('dosen_matakuliah.lihat')->with (array('dosen_matakuliah'=>$dosen_matakuliah));
}
public function update ($id,Request $input)
{
  $dosen_matakuliah = dosen_matakuliah::find($id);
  $dosen_matakuliah->title = $input->title;
  $informasi = $dosen_matakuliah->save() ? 'berhasil update data ':'Gagal update data';
  return redirect ('dosen_matakuliah')->with (['informasi'=>$informasi]);
}
public function hapus ($id)
{
 $dosen_matakuliah = dosen_matakuliah::find($id);
  $informasi = $dosen_matakuliah->delete() ? 'Berhasil hapus data': 'Gagal hapus data';
  return redirect ('dosen_matakuliah')->with (['informasi'=>$informasi]); 
}
}
