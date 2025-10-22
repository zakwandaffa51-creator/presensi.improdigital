<div class="section bg-primary" id="user-section">
  <div id="user-detail">
    <div class="avatar">
      <img src="<?= base_url('foto/') . $karyawan['foto'] ?>" 
           alt="avatar" class="imaged w64 rounded" />
    </div>
    <div id="user-info">
      <h2 id="user-name"><?= $karyawan['nama'] ?></h2>
      <span id="user-role"><?= $karyawan['nama_jabatan'] ?></span>
    </div>
  </div>
</div>

<!-- Menu -->
<div class="section" id="menu-section">
  <div class="card">
    <div class="card-body text-center">
      <div class="list-menu">
        <div class="item-menu text-center">
          <div class="menu-icon">
            <a href="<?= base_url('Home/profile') ?>" class="green" style="font-size: 40px"><i class="fas fa-user"></i></a>
          </div>
          <div class="menu-name"><span class="text-center">Profil</span></div>
        </div>
        <div class="item-menu text-center">
          <div class="menu-icon">
            <a href="<?= base_url('Presensi/izin') ?>" class="danger" style="font-size: 40px"><i class="fas fa-file-alt"></i></a>
          </div>
          <div class="menu-name"><span class="text-center">Izin</span></div>
        </div>
        <div class="item-menu text-center">
          <div class="menu-icon">
            <a href="<?= base_url('Home/history') ?>" class="warning" style="font-size: 40px"><i class="fas fa-calendar-alt"></i></a>
          </div>
          <div class="menu-name"><span class="text-center">Histori</span></div>
        </div>
        <div class="item-menu text-center">
          <div class="menu-icon">
            <a href="<?= base_url('Presensi')?>" class="orange" style="font-size: 40px"><i class="fas fa-camera"></i></a>
          </div>
          <div class="menu-name">Absen</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Presensi Hari Ini -->
<div class="section mt-2" id="presence-section">
  <div class="todaypresence">
    <div class="row">
      <div class="col-6">
        <div class="card bg-success">
          <div class="card-body">
            <div class="presencecontent">
              <div class="iconpresence"><i class="fas fa-clock"></i></div>
              <div class="presencedetail">
                <h4 class="presencetitle">Masuk</h4>
                <span><?= $presensi == null ? '--:--' : $presensi['jam_in'] ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card bg-danger">
          <div class="card-body">
            <div class="presencecontent">
              <div class="iconpresence"><i class="fas fa-clock"></i></div>
              <div class="presencedetail">
                <h4 class="presencetitle">Pulang</h4>
                <span><?= $presensi == null ? '--:--' : ($presensi['jam_out']=='00:00:00' ? '--:--' : $presensi['jam_out']) ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Rekap Bulanan -->
  <div class="rekappresence mt-1">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="presencecontent">
              <div class="iconpresence primary"><i class="fas fa-check"></i></div>
              <div class="presencedetail">
                <h4 class="rekappresencetitle">Hadir</h4>
                <span class="rekappresencedetail"><?= $rekap['hadir'] ?> Hari</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="presencecontent">
              <div class="iconpresence green"><i class="fas fa-info"></i></div>
              <div class="presencedetail">
                <h4 class="rekappresencetitle">Izin</h4>
                <span class="rekappresencedetail"><?= $rekap['izin'] ?> Hari</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-1">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="presencecontent">
              <div class="iconpresence danger"><i class="fas fa-sad-tear"></i></div>
              <div class="presencedetail">
                <h4 class="rekappresencetitle">Sakit</h4>
                <span class="rekappresencedetail"><?= $rekap['sakit'] ?> Hari</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <div class="presencecontent">
              <div class="iconpresence warning"><i class="fa fa-clock"></i></div>
              <div class="presencedetail">
                <h4 class="rekappresencetitle">Terlambat</h4>
                <span class="rekappresencedetail"><?= $rekap['terlambat'] ?> Hari</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- History & Leaderboard -->
  <div class="presencetab mt-2">
    <div class="tab-pane fade show active" id="pilled" role="tabpanel">
      <ul class="nav nav-tabs style1" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Bulan Ini</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Leaderboard</a>
        </li>
      </ul>
    </div>

    <div class="tab-content mt-2" style="margin-bottom: 100px">
      <!-- History -->
      <div class="tab-pane fade show active" id="home" role="tabpanel">
        <ul class="listview image-listview">
          <?php foreach ($history as $key => $value) { ?>
            <li>
              <div class="item">
                <div class="icon-box bg-primary"><i class="fas fa-image"></i></div>
                <div class="in">
                  <div><?= date('d-m-Y', strtotime($value['tgl_presensi'])) ?></div>
                  <span class="badge badge-success"><?= $value['jam_in'] ?></span>
                  <span class="badge badge-danger"><?= $value['jam_out']=='00:00:00' ? '--:--:--' : $value['jam_out'] ?></span>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>

      <!-- Leaderboard -->
      <div class="tab-pane fade" id="profile" role="tabpanel">
        <ul class="listview image-listview">
          <?php foreach ($leaderboard as $key => $value) { ?>
            <li>
              <div class="item">
                <img src="<?= base_url('foto/'). $value['foto'] ?>" alt="image" class="image" />
                <div class="in">
                  <div><?= $value['nama'] ?><br>
                    <small><?= $value['nama_jabatan'] ?></small>
                  </div>
                  <span class="badge badge-success"><?= $value['jam_in'] ?></span>
                  <span class="badge badge-danger"><?= $value['jam_out']=='00:00:00' ? '--:--:--' : $value['jam_out'] ?></span>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="tab-content mt-2" style="margin-bottom: 100px">
        <a href="<?=base_url('Auth/logOut') ?>" class="btn btn-danger btn-sm btn-block">
          <i class="fas fa-sign-out-alt mr-1"></i>logout</a>
      </div>
    </div>
  </div>
</div>
