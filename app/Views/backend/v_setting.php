<div class="col-md-12">
    <div class="card card-primary shadow-lg">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <!-- Card tools (opsional)
            <div class="card-tools">
                <a class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-plus"></i></a>
            </div>
            -->
        </div>
        <!-- /.card-header -->

        <?= form_open("Admin/updateSetting") ?>
        <div class="card-body">
            <?php if (session()->get('pesan')) { ?>
                <div class="alert alert-success">
                    <?= session()->get('pesan') ?>
                </div>
            <?php } ?>

            <div class="form-group">
                <label>Nama Kantor</label>
                <input name="nama_kantor" value="<?= $setting['nama_kantor'] ?>" class="form-control" placeholder="Nama Kantor" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="form-group">
                <label>Lokasi Kantor (Lat,Lng)</label>
                <input name="lokasi_kantor" value="<?= $setting['lokasi_kantor'] ?>" class="form-control" placeholder="-6.200000,106.816666" required>
            </div>

            <div id="map" style="width: 100%; height: 400px"></div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?= form_close() ?>
    </div>
    <!-- /.card -->
</div>

<script>
    // Ambil data lokasi dari PHP
    var lokasi = "<?= $setting['lokasi_kantor'] ?>".split(",");
    var lat = parseFloat(lokasi[0]);
    var lng = parseFloat(lokasi[1]);

    var map = L.map('map').setView([lat, lng], 15);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup('<?= $setting['nama_kantor'] ?>')
        .openPopup();

    L.circle([lat, lng], {
        color: 'blue',
        fillColor: 'blue',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(map);
</script>
