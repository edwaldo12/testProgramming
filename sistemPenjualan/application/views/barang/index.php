<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="">Barang</h4>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('barang_controller/halamanTambah') ?>">
                    <button type="button" class="mb-3 btn btn-primary">Tambah Barang</button>
                </a>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Barang</h4>
                    </div>

                    <div class="card-body">
                        <table class="table" id="barang">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Harga Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang as $key => $j) { ?>
                                    <tr>
                                        <td><?= $j['id'] ?></td>
                                        <td><?= $j['nama_barang'] ?></td>
                                        <td><?= $j['harga_barang'] ?></td>
                                        <td><?= $j['jumlah_barang'] ?></td>
                                        <td><?= $j['tanggal'] ?></td>
                                        <td>
                                            <a href="<?php echo site_url('barang_controller/halamanEdit/' . $j['id']) ?>">
                                                <button class="btn btn-warning btn-sm text-white">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo site_url('barang_controller/delete/' . $j['id']) ?>">
                                                <button class="btn btn-danger btn-sm text-white">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $("#barang").DataTable()
    })
</script>

<?php if ($this->session->flashdata('tambah_barang')) { ?>
    <?php unset($_SESSION['tambah_barang']) ?>
    <script>
        alert('Tambah Barang berhasil!');
    </script>
<?php } ?>

<?php if ($this->session->flashdata('update_barang')) { ?>
    <?php unset($_SESSION['update_barang']) ?>
    <script>
        alert('Update Barang berhasil!');
    </script>
<?php } ?>

<?php if ($this->session->flashdata('hapus_barang')) { ?>
    <?php unset($_SESSION['hapus_barang']) ?>
    <script>
        alert('Hapus Barang berhasil!');
    </script>
<?php } ?>