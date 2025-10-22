<div class="row">
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= $hadir ?? 0 ?></h3>
        <p>Hadir</p>
      </div>
      <div class="icon"><i class="fas fa-user-check"></i></div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= $terlambat ?? 0 ?></h3>
        <p>Terlambat</p>
      </div>
      <div class="icon"><i class="fas fa-user-clock"></i></div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= $alpa ?? 0 ?></h3>
        <p>Tanpa Keterangan</p>
      </div>
      <div class="icon"><i class="fas fa-user-times"></i></div>
    </div>
  </div>

  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= $total_presensi ?? 0 ?></h3>
        <p>Total Presensi</p>
      </div>
      <div class="icon"><i class="fas fa-users"></i></div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title">Monitoring Presensi</h3>
  </div>
  <div class="card-body">
    <form method="get" action="">
      <div class="row mb-3">
        <div class="col-md-4">
          <label>Tanggal Awal</label>
          <input type="date" name="tgl_awal" class="form-control" value="<?= $_GET['tgl_awal'] ?? '' ?>">
        </div>
        <div class="col-md-4">
          <label>Tanggal Akhir</label>
          <input type="date" name="tgl_akhir" class="form-control" value="<?= $_GET['tgl_akhir'] ?? '' ?>">
        </div>
        <div class="col-md-4">
          <label>&nbsp;</label><br>
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </div>
    </form>

    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Karyawan</th>
          <th>Tanggal</th>
          <th>Jam Masuk</th>
          <th>Jam Pulang</th>
          <th>Lokasi Masuk</th>
          <th>Lokasi Pulang</th>
          <th>Foto Masuk</th>
          <th>Foto Pulang</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach ($presensi as $p): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['nama'] ?></td>
            <td><?= date('d-m-Y', strtotime($p['tgl_presensi'])) ?></td>
            <td>
              <?php if ($p['jam_in']): ?>
                <span class="badge <?= ($p['jam_in'] > '08:00:00') ? 'badge-warning' : 'badge-success' ?>">
                  <?= $p['jam_in'] ?>
                </span>
              <?php else: ?>
                <span class="badge badge-danger">Alpa</span>
              <?php endif; ?>
            </td>
            <td><?= $p['jam_out'] ?? '-' ?></td>
            <td><?= $p['lokasi_in'] ?? '-' ?></td>
            <td><?= $p['lokasi_out'] ?? '-' ?></td>
            <td>
              <?php if ($p['foto_in']): ?>
                <img src="<?= base_url('foto/'.$p['foto_in']) ?>" width="70">
              <?php endif; ?>
            </td>
            <td>
              <?php if ($p['foto_out']): ?>
                <img src="<?= base_url('foto/'.$p['foto_out']) ?>" width="70">
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
