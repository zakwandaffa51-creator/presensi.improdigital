<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKaryawan;
use App\Models\ModelJabatan;

class Karyawan extends BaseController
{
    public function __construct() {
        $this->ModelKaryawan = new ModelKaryawan();
        $this->ModelJabatan = new ModelJabatan();
    }

    public function index()
    {
       $data = [
            'judul' =>  'Jabatan',
            'menu'  =>  'jabatan',
            'page'  =>  'backend/v_karyawan',
            'karyawan'=> $this->ModelKaryawan->allData(),
            'jabatan'=> $this->ModelJabatan->allData(),
        ];
        return view('v_template_back',$data);
    }

     public function insertData(){
        $foto = $this->request->getPost('foto');
        $file_name = $foto->getRamdomName();
        $data = [
            'id_jabatan'=>$this->request->getPost('id_jabatan'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password'),
            'foto'=>$file_name,
        ];
        $foto->move('foto',$file_name);
        $this->ModelKaryawan->insertData($data);
        session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('Karyawan');
    }

    public function updateData($id_jabatan){
        $foto = $this->request->getFile('foto');
        $file_name = $foto->getRamdomName();
        if ($foto->getErrors() == 4) {
              $data = [
            'id_jabatan'=>$this->request->getPost('id_jabatan'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password'),
            ];
            $this->ModelKaryawan->updateData($data);
        }else {
            $data = [
            'id_jabatan'=>$this->request->getPost('id_jabatan'),
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>$this->request->getPost('password'),
            'foto'=>$file_name,
            ];
            $foto->move('foto',$file_name);
            $this->ModelKaryawan->updateData($data);
        }
        session()->setFlashdata('pesan','Data Berhasil Diupdate');
        return redirect()->to('Karyawan');
    }

    public function deleteData($id_karyawan){
        $data = [
            'id_karyawan'    => $id_karyawan,
        ];
        $this->ModelKaryawan->deleteData($data);
        session()->setFlashdata('pesan','Data Berhasil Dihapus');
        return redirect()->to('Karyawan');
    }

}