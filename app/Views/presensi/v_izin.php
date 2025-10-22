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
    <div class="col-sm-12">
        <?php
         if (session()->get('pesan')) {
                    echo '<div class="alert alert-success">';
                    echo session()->get('pesan');
                    echo '</div>';
                }
        ?>
        <ul class="listview image-listview">
            <?php foreach ($izin as $key => $value) {?>
                <li>
                <div class="item">
                    <div class="in">
                        <div><b><?= date('d-m-Y',strtotime($value['tgl_izin'])) ?></b><br>
                            <small><?=$value['status_izin']==1 ? 'izin' :'sakit' ?></small><br>
                            <small><?= $value['ket_izin'] ?></small>
                        </div>
                        <div>
                            <?php
                            if ($value['status_approved'] == 0) { ?>
                                <span class="badge badge-warning">Dikirim</span>
                            <?php } elseif ($value["status_approved"]== 1) { ?>
                               <span class="badge badge-success">Diterima</span>
                            <?Php } else { ?>
                                <span class="badge badge-danger">Ditolak</span>
                            <?php } ?>    
                        </div>
                    </div>
                </div>
                </li>
            <?php  }?>
        </ul>
    </div>
</div>

<div class="fab-button botton-right" style="margin-buttom: 60px">
    <a href="<?= base_url('Presensi/pengajuanIzin')?>" class="fab"><i class="fa fa-plus"></i></a>
</div>