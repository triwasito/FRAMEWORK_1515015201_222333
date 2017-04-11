<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\dosen;
use App\Pengguna;

class DosenController extends Controller
{
   public function awal()
    {
        $semuadosen = dosen::all();
        return view('dosen.awal', compact('semuadosen'));
    }

    public function tambah()
    {
        return view('dosen.tambah');
    }

    public function simpan(Request $input)
    {
        $pengguna = new Pengguna($input->only('username','password'));
        if ($pengguna->save()){
        $dosen = new dosen();
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        if ($pengguna->dosen()->save($dosen))
            $this->informasi='Berhasil simpan data';
        
        }
        //$informasi =$dosen->save() ? 'Berhasil simpan data' :'Gagal simpan data';
        return redirect('dosen')->with(['informasi'=>$this->informasi]);
    }

    public function edit($id)
    {
        $dosen = dosen::find($id);
        return view('dosen.edit')->with(array('dosen'=>$dosen));
    }

    public function lihat($id)
    {
        $dosen = dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }

    public function update($id,Request $input)
    {
        $dosen = dosen::find($id);
        $pengguna = $dosen->pengguna;
        $dosen->nama = $input->nama;
        $dosen->nip = $input->nip;
        $dosen->alamat = $input->alamat;
        $informasi = $dosen->save();
        if (!is_null($input->username)){
            $pengguna->fill($input->only('username'));

            if (!empty($input->password)) {
                $pengguna->passsword = $input->password;
            }

            if ($pengguna->save()){
                $this->informasi = 'Berhasil simpan data';
            }
            else{
                $this->informasi = 'Gagal Simpan Data';
            }
        }

        return redirect('dosen')->with(['informasi' => $this-> informasi]);
    }

     public function hapus($id)
    {
        $dosen = dosen::find($id);
        if($dosen->pengguna()->delete()){
            if($dosen->delete()) {
                $this->informasi = 'Berhasil hapus data';
            }
        }
            return redirect('dosen')-> with(['informasi'=>$this->informasi]);
        
    }
}