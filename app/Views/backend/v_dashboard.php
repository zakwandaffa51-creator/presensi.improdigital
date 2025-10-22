<div class="row">
  <!-- Small boxes (Stat box) -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $jml_dikirim ?></h3>
        <p>Izin Pending</p>
      </div>
      <div class="icon"><i class="fas fa-hourglass-half"></i></div>
      <a href="#izin-pending" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-down"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $jml_diterima ?></h3>
        <p>Izin Diterima</p>
      </div>
      <div class="icon"><i class="fas fa-check-circle"></i></div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $jml_ditolak ?></h3>
        <p>Izin Ditolak</p>
      </div>
      <div class="icon"><i class="fas fa-times-circle"></i></div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $jml_total ?></h3>
        <p>Total Pengajuan</p>
      </div>
      <div class="icon"><i class="fas fa-database"></i></div>
    </div>
  </div>
</div>
<!-- /.row -->

<hr>

<!-- Daftar izin pending -->
<div class="row" id="izin-pending">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-warning">
        <h3 class="card-title">Daftar Izin Pending</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Karyawan</th>
              <th>Tanggal</th>
              <th>Jenis</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach ($izin_pending as $izin): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $izin['nama'] ?></td>
                <td><?= date('d-m-Y', strtotime($izin['tgl_izin'])) ?></td>
                <td><?= $izin['status_izin'] == 1 ? 'Sakit' : 'Izin' ?></td>
                <td><?= $izin['ket_izin'] ?></td>
                <td>
                  <a href="<?= base_url('Admin/approveIzin/'.$izin['id_izin'].'/1') ?>" 
                     class="btn btn-success btn-sm">Terima</a>
                  <a href="<?= base_url('Admin/approveIzin/'.$izin['id_izin'].'/2') ?>" 
                     class="btn btn-danger btn-sm">Tolak</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
