<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="<?= base_url('Home')?>" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle"><?= $judul ?></div>
    <div class="right"></div>
</div>
<!-- * App Header -->

<div class="row" style="margin-top: 70px; margin-left: 10px; margin-right:10px;">
    <div class="col-sm-12 text-center">

        <!-- Foto Profil -->
        <div class="avatar mb-3">
            <img src="<?= base_url('foto/') ?><?=$karyawan['foto']?>"
                 alt="avatar"
                 style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; box-shadow: 0 4px 10px rgba(0,0,0,0.2);" />
        </div>

        <!-- Data Profil -->
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" value="<?= $karyawan['nama']?>" class="form-control text-center" readonly>
        </div>
        <div class="form-group">
            <label>Nama Jabatan</label>
            <input name="nama_jabatan" value="<?= $karyawan['nama_jabatan']?>" class="form-control text-center" readonly>
        </div>
        <div class="form-group">
            <label>Username</label>
            <input name="username" value="<?= $karyawan['nama']?>" class="form-control text-center" readonly>
        </div>

    </div>
</div>
