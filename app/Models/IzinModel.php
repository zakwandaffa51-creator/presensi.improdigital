<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinModel extends Model
{
    protected $table      = 'tbl_izin';
    protected $primaryKey = 'id_izin';

    protected $allowedFields = [
        'id_karyawan',
        'tgl_izin',
        'status_izin',
        'ket_izin',
        'status_approved'
    ];

    // ambil izin pending dengan join ke karyawan
    public function getIzinPending()
    {
        return $this->db->table($this->table)
            ->join('tbl_karyawan', 'tbl_karyawan.id_karyawan = tbl_izin.id_karyawan')
            ->where('status_approved', 0)
            ->get()
            ->getResultArray();
    }
}
