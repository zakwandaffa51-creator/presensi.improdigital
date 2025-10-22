<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDataPresensi;

class DataPresensi extends BaseController
{
    protected $ModelDataPresensi;

    public function __construct()
    {
        $this->ModelDataPresensi = new ModelDataPresensi();
    }

    public function index()
    {
        $tgl_awal  = $this->request->getGet('tgl_awal');
        $tgl_akhir = $this->request->getGet('tgl_akhir');

        $data = [
            'judul'          => 'Monitoring Presensi',
            'menu'           => 'presensi',
            'page'           => 'backend/v_data_presensi',
            'presensi'       => $this->ModelDataPresensi->getPresensi($tgl_awal, $tgl_akhir),
            'total_presensi' => $this->ModelDataPresensi->countPresensi($tgl_awal, $tgl_akhir),
            'hadir'          => $this->ModelDataPresensi->countHadir($tgl_awal, $tgl_akhir),
            'terlambat'      => $this->ModelDataPresensi->countTerlambat($tgl_awal, $tgl_akhir),
            'alpa'           => $this->ModelDataPresensi->countAlpa($tgl_awal, $tgl_akhir),
            'tgl_awal'       => $tgl_awal,
            'tgl_akhir'      => $tgl_akhir,
        ];

        return view('v_template_back', $data);
    }

    // Jika nanti mau ditambah aksi insert/update/delete
    public function insertData()
    {
        $data = [
            'id_karyawan'   => $this->request->getPost('id_karyawan'),
            'tgl_presensi'  => $this->request->getPost('tgl_presensi'),
            'jam_in'        => $this->request->getPost('jam_in'),
            'jam_out'       => $this->request->getPost('jam_out'),
        ];

        $this->ModelDataPresensi->insert($data);
        session()->setFlashdata('pesan', 'Data Presensi Berhasil Ditambahkan');
        return redirect()->to('DataPresensi');
    }

    public function updateData($id_presensi)
    {
        $data = [
            'id_presensi'   => $id_presensi,
            'id_karyawan'   => $this->request->getPost('id_karyawan'),
            'tgl_presensi'  => $this->request->getPost('tgl_presensi'),
            'jam_in'        => $this->request->getPost('jam_in'),
            'jam_out'       => $this->request->getPost('jam_out'),
        ];

        $this->ModelDataPresensi->save($data);
        session()->setFlashdata('pesan', 'Data Presensi Berhasil Diupdate');
        return redirect()->to('DataPresensi');
    }

    public function deleteData($id_presensi)
    {
        $this->ModelDataPresensi->delete($id_presensi);
        session()->setFlashdata('pesan', 'Data Presensi Berhasil Dihapus');
        return redirect()->to('DataPresensi');
    }
}
