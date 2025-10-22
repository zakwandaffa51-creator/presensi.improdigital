<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHome extends Model
{
    public function dataKaryawan(){
        return $this->db->table('tbl_karyawan')
        ->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_karyawan','LEFT')
        ->where('id_karyawan', session()->get('id_karyawan'))->get()->getRowArray();
    }

    public function cekPresensi(){
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('tgl_presensi', date('Y-m-d'))
        ->get()->getRowArray();
    }

    public function presensiBulanan(){
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('month(tgl_presensi)', date('m'))
        ->where('year(tgl_presensi)', date('Y'))
        ->get()->getResultArray();
    }

    public function leaderboard(){
        return $this->db->table('tbl_presensi')
        ->join('tbl_karyawan','tbl_karyawan.id_karyawan = tbl_presensi.id_karyawan','LEFT')
        ->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_karyawan.id_karyawan','LEFT')
        ->where('tbl_presensi.tgl_presensi', date('Y-m-d'))
        ->orderBy('tbl_presensi.id_presensi','DESC')
        ->get()->getResultArray();
    }

      public function historyPresensi($bulan,$tahun){
        return $this->db->table('tbl_presensi')
        ->where('id_karyawan', session()->get('id_karyawan'))
        ->where('month(tgl_presensi)', $bulan)
        ->where('year(tgl_presensi)', $tahun)
        ->get()->getResultArray();
    }

    public function rekapBulanan()
{
    $id_karyawan = session()->get('id_karyawan');
    $bulan = date('m');
    $tahun = date('Y');

    // Hitung Hadir
    $hadir = $this->db->table('tbl_presensi')
        ->where('id_karyawan', $id_karyawan)
        ->where('MONTH(tgl_presensi)', $bulan)
        ->where('YEAR(tgl_presensi)', $tahun)
        ->countAllResults();

    // Hitung Sakit
    $sakit = $this->db->table('tbl_izin')
        ->where('id_karyawan', $id_karyawan)
        ->where('status_izin', 1) // 1 = sakit
        ->where('MONTH(tgl_izin)', $bulan)
        ->where('YEAR(tgl_izin)', $tahun)
        ->countAllResults();

    // Hitung Izin
    $izin = $this->db->table('tbl_izin')
        ->where('id_karyawan', $id_karyawan)
        ->where('status_izin', 2) // 2 = izin
        ->where('MONTH(tgl_izin)', $bulan)
        ->where('YEAR(tgl_izin)', $tahun)
        ->countAllResults();

    // Hitung Terlambat (jam_in > 08:00:00 misalnya)
    $terlambat = $this->db->table('tbl_presensi')
        ->where('id_karyawan', $id_karyawan)
        ->where('MONTH(tgl_presensi)', $bulan)
        ->where('YEAR(tgl_presensi)', $tahun)
        ->where('jam_in >', '08:00:00')
        ->countAllResults();

    return [
        'hadir' => $hadir,
        'sakit' => $sakit,
        'izin' => $izin,
        'terlambat' => $terlambat,
    ];
}
}