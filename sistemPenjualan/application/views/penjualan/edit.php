<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Penjualan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_barang">Nama Pemesan</label>
                                <input type="text" class="form-control" id="nama_pemesan" placeholder="Masukkan Nama Pemesan" name="nama_pemesan" required value="<?php echo $nama_pembeli['nama_pemesan'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    Pesanan Detail
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-xs-5 col-sm-5">
                            <div class="form-group">
                                <label>Nama Barang:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-basket-shopping"></i></span>
                                    </div>
                                    <select name="nama_barang" id="barang" class="form-control">
                                        <?php foreach ($barang as $key => $b) { ?>
                                            <option value="<?php echo $b['id'] ?>" data-harga="<?php echo $b['harga_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-5 col-sm-5">
                            <div class="form-group">
                                <label>Jumlah Pembelian:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-basket-shopping"></i></span>
                                    </div>
                                    <input min="1" type="number" class="form-control" id="jumlah_pembelian" placeholder="Masukkan Jumlah Pembelian" name="jumlah_pembelian" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-2 col-sm-2">
                            <div class="form-group">
                                <label for=""></label>
                                <div style="margin-top:9px;">
                                    <button type="button" class="btn btn-sm btn-success" id="btnTambahPenjualanOrder">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Sub Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_pembelian_body"></tbody>
                            </table>
                            <p id="total" style="padding-left:8px"></p>
                            <button type="button" class="btn btn-sm btn-success" id="addPenjualanOrder">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {

        let penjualanOrder = [];
        penjualanOrder = JSON.parse(`<?php echo $penjualan ?>`)
        refreshTable();

        function refreshTable() {
            $(function() {
                let penjualan = "";
                for (let i = 0; i < penjualanOrder.length; i++) {
                    penjualan += "<tr>" +
                        "<td>" + penjualanOrder[i].nama_barang + "</td>" +
                        "<td>" + formatRupiah(String(penjualanOrder[i].harga_barang)) + "</td>" +
                        "<td>" + penjualanOrder[i].jumlah_pesanan + "</td>" +
                        "<td>" + formatRupiah(String(penjualanOrder[i].subtotal)) + "</td>" +
                        "<td>" +
                        "<button class='btn btn-xs btn-danger' onclick='removePenjualan(" + i +
                        ")'><i class='fa fa-close'></button>" +
                        "</td>" +
                        "</tr>"
                }
                $('#detail_pembelian_body').html(penjualan)
            });
            calculateTotal();
        }

        $("#btnTambahPenjualanOrder").on('click', async function() {
            let stok = await getStok();
            let id_barang = $("#barang option:selected").val();
            let jumlahBarang = parseInt($("#jumlah_pembelian").val());

            if (stok < jumlahBarang) {
                alert('Stok Kurang')
                return;
            }
            if (jumlahBarang < 0 || jumlahBarang == "") {
                alert("Jumlah penjualan harus di isi !")
                return;
            }
            let cari = penjualanOrder.find(function(order) {
                return order.id_barang == id_barang;
            });

            if (cari != undefined) {
                let index = penjualanOrder.indexOf(cari);
                let harga = $("#barang option:selected").data('harga');
                let jumlah_pesanan = $("#jumlah_pembelian").val();
                penjualanOrder[index].jumlah_pesanan = parseInt(penjualanOrder[index].jumlah_pesanan) + parseInt($("#jumlah_pembelian").val());
                penjualanOrder[index].subtotal = parseInt(penjualanOrder[index].subtotal) + (jumlah_pesanan * harga);
            } else {
                let jumlah_pesanan = parseInt($("#jumlah_pembelian").val());
                let harga = $("#barang option:selected").data('harga');
                let order = {
                    id_barang: id_barang,
                    nama_barang: $("#barang option:selected").text().trim(),
                    harga_barang: harga,
                    jumlah_pesanan: jumlah_pesanan,
                    subtotal: jumlah_pesanan * harga
                };
                penjualanOrder.push(order);
            }
            refreshTable();
        });

        function calculateTotal() {
            let total = penjualanOrder.reduce((a, b) => {
                return a + (b.harga_barang * b.jumlah_pesanan);
            }, 0);

            $("#total").text("Total Pembelian : " + formatRupiah(String(total)));
        }


        function removePenjualan(index) {
            penjualanOrder.splice(index, 1);
            refreshTable();
        }

        function validate() {
            let isValidationError = false;
            let nama_pelanggan = $("#nama_pemesan").val();

            let isNamaPelangganEmpty = nama_pelanggan == "";

            if (isNamaPelangganEmpty) {
                alert('Nama Pelanggan Kosong!');
                isValidationError = true;
            }

            if (penjualanOrder.length < 1) {
                alert("Penjualan tidak boleh kosong.")
                isValidationError = true;
            }
            return isValidationError;
        }


        $("#addPenjualanOrder").on('click', function() {
            if (validate())
                return;

            let token_name = $("meta[name='_token_name']").attr('content');
            let token_value = $("meta[name='_token_value']").attr('content');
            let penjualan = {
                nama_pelanggan: $("#nama_pemesan").val()
            }
            let form_data = {
                penjualan: penjualan,
                penjualanOrder: penjualanOrder,
            }
            form_data[token_name] = token_value;
            console.log(form_data);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('penjualan_controller/updatePenjualan/') . $nama_pembeli['id'] ?> ",
                data: form_data,
                success: function(result) {
                    if (result.success)
                        alert("Penjualan berhasil di ubah.")
                    window.location.href = "<?php echo site_url('penjualan_controller') ?>";
                }
            })
        });

        function hasNumbers(t) {
            var regex = /^[0-9]+$/;
            return regex.test(t);
        }

        async function getStok() {
            let stok = 0;
            let id = $("#barang").val();
            let jumlahPembelian = parseInt($("#jumlah_pembelian").val());

            await $.ajax({
                type: "GET",
                url: "<?php echo site_url('penjualan_controller/checkStok') ?>" + "/" + id,
                success: function(barang) {
                    stok = barang.jumlah_barang
                }
            });
            return stok;
        }
    });
</script>