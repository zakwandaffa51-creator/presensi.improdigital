<!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="<?= base_url('Home')?>" class="headerButton goBack">
                <i class="fas fa-arrow-left fa-2x"></i>
            </a>
        </div>
        <div class="pageTitle"><?=$judul?></div>
        <div class="right"></div>
    </div>
<!-- * App Header -->

<div class= "row" style= "margin-top: 70px; margin-left: 10px; margin-right:10px;">
    <div class="col-sm-12 text-center">
        <i class="far fa-check-circle fa-4x text-success"></i>
    </div>
    <div class="col-sm-12 text-center">
        <br>
        <h2>Anda Sudah Absen Hari Ini</h2>
        <h4><?=date('d F Y',strtotime($presensi['tgl_presensi'])) ?></h4>
        <h4>Masuk: <?= $presensi['jam_in'] ?></h4>
        <h4>Pulang:<?= $presensi['jam_out']?></h4>
        <h1 class="text-primary">Selamat Beristirahat</h1>
    </div>
</div>