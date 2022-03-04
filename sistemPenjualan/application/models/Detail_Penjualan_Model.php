<?php

class Detail_Penjualan_Model extends CI_Model
{

    public function getByPenjualanId($penjualan_id)
    {
        $this->db->where('fk_penjualan', $penjualan_id);
        return $this->db->get('detail_penjualan')->result_array();
    }

    public function addDetailPenjualanOrder($data, $penjualan_id)
    {
        foreach ($data as $value) {
            $this->db->insert('detail_penjualan', array(
                'fk_penjualan' => $penjualan_id,
                'fk_barang' => $value['id_barang'],
                'jumlah_pembelian' => $value['jumlah_pesanan']
            ));

            $barang = $this->barang->getBarang($value['id_barang']);
            $this->db->where('id', $value['id_barang']);
            $this->db->update('barang', [
                'jumlah_barang' => $barang['jumlah_barang'] - $value['jumlah_pesanan']
            ]);
        }
    }

    public function updateDetailPenjualanOrder($data, $penjualan_id)
    {
        $detail_penjualan = $this->getByPenjualanId($penjualan_id);
        foreach ($detail_penjualan as $detail) {
            $barang = $this->barang->getBarang($detail['fk_barang']);
            $this->db->where('id', $detail['fk_barang']);
            $this->db->update('barang', [
                'jumlah_barang' => $barang['jumlah_barang'] + $detail['jumlah_pembelian']
            ]);
        }
        $this->db->where('fk_penjualan', $penjualan_id);
        $this->db->delete('detail_penjualan');

        foreach ($data as $value) {
            $this->db->insert('detail_penjualan', array(
                'fk_penjualan' => $penjualan_id,
                'fk_barang' => $value['id_barang'],
                'jumlah_pembelian' => $value['jumlah_pesanan']
            ));

            $barang = $this->barang->getBarang($value['id_barang']);
            $this->db->where('id', $value['id_barang']);
            $this->db->update('barang', [
                'jumlah_barang' => $barang['jumlah_barang'] - $value['jumlah_pesanan']
            ]);
        }
    }
}
