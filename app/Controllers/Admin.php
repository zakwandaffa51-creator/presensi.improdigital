<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use App\Models\IzinModel;

class Admin extends BaseController
{
    protected $ModelAdmin;
    protected $IzinModel;

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        $this->IzinModel  = new IzinModel();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'menu'  => 'dashboard',
            'page'  => 'backend/v_dashboard',

            // statistik izin
            'jml_dikirim'  => $this->IzinModel->where('status_approved', 0)->countAllResults(),
            'jml_diterima' => $this->IzinModel->where('status_approved', 1)->countAllResults(),
            'jml_ditolak'  => $this->IzinModel->where('status_approved', 2)->countAllResults(),
            'jml_total'    => $this->IzinModel->countAll(),

            // daftar izin pending
            'izin_pending' => $this->IzinModel->getIzinPending(),
        ];

        return view('v_template_back', $data);
    }

    public function setting()
    {
        $data = [
            'judul'   => 'Setting',
            'menu'    => 'setting',
            'page'    => 'backend/v_setting',
            'setting' => $this->ModelAdmin->dataSetting(),
        ];
        return view('v_template_back', $data);
    }

    public function updateSetting()
    {
        $data = [
            'nama_kantor'   => $this->request->getPost('nama_kantor'),
            'alamat'        => $this->request->getPost('alamat'),
            'lokasi_kantor' => $this->request->getPost('lokasi_kantor'),
        ];
        $this->ModelAdmin->updateSetting($data);
        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('Admin/setting');
    }

    // approve / tolak izin
    public function approveIzin($id_izin, $status)
    {
        $this->IzinModel->update($id_izin, ['status_approved' => $status]);
        session()->setFlashdata('pesan', 'Status izin berhasil diperbarui');
        return redirect()->to('Admin');
    }

}
