<?php

class Penjualan_Model extends CI_Model
{
    function getAllPenjualan($start_date, $end_date)
    {
        $this->db->select("p.id,p.nama_pemesan,sum(dp.jumlah_pembelian * b.harga_barang) as total_pembelian, p.tanggal,sum(dp.jumlah_pembelian) as jumlah_pembelian");
        $this->db->join("detail_penjualan as dp", "dp.fk_penjualan = p.id");
        $this->db->join("barang as b", "b.id = dp.fk_barang");
        $this->db->where('p.status', '1');
        if ($start_date && $end_date) {
            $this->db->where('p.tanggal >=', $start_date . " 00:00:00");
            $this->db->where('p.tanggal <=', $end_date . " 23:59:59");
        }
        $this->db->group_by("p.id");
        return $this->db->get("penjualan as p")->result_array();
    }

    function addPenjualanOrder($data)
    {
        extract($data);
        $this->db->insert('penjualan', array(
            'nama_pemesan' => $nama_pelanggan,
            'status' => '1'
        ));
        return $this->db->insert_id();
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('penjualan', array(
            'status' => '0'
        ));
        $detail_penjualan = $this->detail_penjualan->getByPenjualanId($id);
        foreach ($detail_penjualan as $detail) {
            $barang = $this->barang->getBarang($detail['fk_barang']);
            $this->db->where('id', $detail['fk_barang']);
            $this->db->update('barang', [
                'jumlah_barang' => $barang['jumlah_barang'] + $detail['jumlah_pembelian']
            ]);
        }
    }

    public function getDateBetween($tanggal_awal, $tanggal_akhir)
    {
    }

    public function getNamaPembeli($id)
    {
        $this->db->select("penjualan.id,penjualan.nama_pemesan");
        $this->db->where("id", $id);
        return $this->db->get('penjualan')->row_array();
    }

    public function getPenjualanPerId($id)
    {
        $this->db->select("p.id, b.nama_barang, b.harga_barang, sum(dp.jumlah_pembelian * b.harga_barang) as total_pembelian, p.tanggal,sum(dp.jumlah_pembelian) as jumlah_pembelian");
        $this->db->join("detail_penjualan as dp", "dp.fk_penjualan = p.id");
        $this->db->join("barang as b", "b.id = dp.fk_barang");
        $this->db->where('p.id', $id);
        return $this->db->get("penjualan as p")->result_array();
    }

    public function editPenjualan($id)
    {
        $this->db->select('dp.fk_barang as id_barang,b.nama_barang,b.harga_barang,dp.jumlah_pembelian as jumlah_pesanan,(dp.jumlah_pembelian * b.harga_barang) as subtotal');
        $this->db->join("detail_penjualan as dp", "dp.fk_penjualan = p.id");
        $this->db->join("barang as b", "b.id = dp.fk_barang");
        $this->db->group_by('dp.fk_barang');
        $this->db->where('p.id', $id);
        return $this->db->get('penjualan as p')->result_array();
    }

    public function updatePenjualan($penjualan, $penjualan_id)
    {
        $this->db->where('id', $penjualan_id);
        $this->db->update(
            'penjualan',
            [
                'nama_pemesan' => $penjualan['nama_pelanggan']
            ]
        );
    }
}
