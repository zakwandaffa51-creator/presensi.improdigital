<div class="col-md-12">
    <div class="card card-primary card-outline shadow-lg">
        <div class="card-header">
            <h3 class="card-title">Data Karyawan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" data-target="#add"><i class="fas fa-plus">Tambah</i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <?php 
                if (session()->get('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                    echo session()->get('pesan');
                    echo 'Alert!</h5></div>';
                }
                ?>
            <table class="table table-bordered">
                <tr class="text-center">
                    <th width="50px">No</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Foto</th>
                    <th width="150px">Aksi</th>
                </tr>
                <?php $no=1; 
                foreach ($karyawan as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $value['nama'] ?></td>
                        <td class="text-center"><?= $value['nama_jabatan'] ?></td>
                        <td class="text-center"><?= $value['username'] ?></td>
                        <td class="text-center"><img src="<?= base_url('foto/'.$value['foto'] )?>" width="100px"></td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-flat btn-warning" data-toggle="modal" data-target="#edit<?=$value['id_karyawan']?>"><i class="fas fa-pencil-alt"></i></button>
                            <a href="<?= base_url('Karyawan/deleteData/'.$value['id_karyawan'])?>" onclick="return confirm('Yakin hapus data')" class="btn btn-sm btn-flat btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
            <!-- /.card -->
</div>
          <!-- /.col -->

 <!-- modal tambah -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Karyawan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?= form_open_multipart('Karyawan/insertData') ?>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Karyawan</label>
                <input name="nama" placeholder="Nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama Jabatan</label>
              <select name="id_jabatan" class="form-control" required>
                <option value="">--Pilih--</option>
                <?php foreach ($jabatan as $key => $value) { ?>  
                  <option value="<?= $value['id_jabatan'] ?>"><?= $value['nama_jabatan'] ?></option>
                <?php } ?>  
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Foto Karyawan</label>
              <input type="file" name="foto" accept="image/*" class="form-control" required>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            <?= form_close() ?>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>


 <?php  foreach ($karyawan as $key => $data) { ?>
  <!-- modal tambah -->
  <div class="modal fade" id="edit<?= $data['id_karyawan']?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Jabatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?= form_open_multipart('Karyawan/updateData/'.$data['id_karyawan']) ?>
            <div class="modal-body">
              <div class="form-group">
                <label>Nama Karyawan</label>
                <input name="nama" value="<?= $data['nama']  ?>" placeholder="Nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama Jabatan</label>
              <select name="id_jabatan" class="form-control" required>
                <option value="">--Pilih--</option>
                <?php foreach ($jabatan as $key => $value) { ?>  
                  <option value="<?= $value['id_jabatan'] ?>" <?= $value['id_jabatan'] == $value['id_jabatan'] ? 'selected': '' ?>><?= $value['nama_jabatan'] ?></option>
                <?php } ?>  
              </select>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="username" value="<?= $data['username']  ?>" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" value="<?= $data['password']  ?>" placeholder="Password" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Foto Karyawan</label>
              <input type="file" name="foto" accept="image/*" class="form-control">
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
            <?= form_close() ?>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
  </div>
 <?php } ?>    