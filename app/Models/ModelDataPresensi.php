<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDataPresensi extends Model
{
    protected $table = 'tbl_presensi'; // pastikan nama tabel sesuai di database
    protected $primaryKey = 'id_presensi';

    public function getPresensi($tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table($this->table)
            ->join('tbl_karyawan', 'tbl_karyawan.id_karyawan = tbl_presensi.id_karyawan');

        if ($tgl_awal && $tgl_akhir) {
            $builder->where('tgl_presensi >=', $tgl_awal)
                    ->where('tgl_presensi <=', $tgl_akhir);
        }

        return $builder->get()->getResultArray();
    }

    public function countPresensi($tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table($this->table);

        if ($tgl_awal && $tgl_akhir) {
            $builder->where('tgl_presensi >=', $tgl_awal)
                    ->where('tgl_presensi <=', $tgl_akhir);
        }

        return $builder->countAllResults();
    }

    public function countHadir($tgl_awal = null, $tgl_akhir = null)
    {
        $builder = $this->db->table($this->table)
            ->where('jam_in IS NOT NULL');

        if ($tgl_awal && $tgl_akhir) {
            $builder->where('tgl_presensi >=', $tgl_awal)
                    ->where('tgl_presensi <=', $tgl_akhir);
        }

        return $builder->countAllResults();
    }

    public function countTerlambat($tgl_awal = null, $tgl_akhir = null)
    {
        $jam_batas = "08:00:00";

        $builder = $this->db->table($this->table)
            ->where('jam_in >', $jam_batas);

        if ($tgl_awal && $tgl_akhir) {
            $builder->where('tgl_presensi >=', $tgl_awal)
                    ->where('tgl_presensi <=', $tgl_akhir);
        }

        return $builder->countAllResults();
    }

    public function countAlpa($tgl_awal = null, $tgl_akhir = null)
    {
        // hitung alpa = total karyawan - yang hadir
        $total_karyawan = $this->db->table('tbl_karyawan')->countAllResults();
        $hadir = $this->countHadir($tgl_awal, $tgl_akhir);

        return $total_karyawan - $hadir;
    }
}
