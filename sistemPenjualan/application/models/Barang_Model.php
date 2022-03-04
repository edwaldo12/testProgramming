<?php

class Barang_Model extends CI_Model
{
    public function getAllBarang($start_date, $end_date)
    {
        $this->db->where('status', '1');
        if ($start_date && $end_date) {
            $this->db->where('tanggal >=', $start_date . " 00:00:00");
            $this->db->where('tanggal <=', $end_date . " 23:59:59");
        }
        return $this->db->get("barang")->result_array();
    }

    public function getAllBarangForPenjualan()
    {
        $this->db->where('status', '1');
        return $this->db->get("barang")->result_array();
    }

    public function getBarang($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('barang')->row_array();
    }

    public function addNewBarang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function delete($data)
    {
        extract($data);
        $this->db->where('id', $id);
        $this->db->update('barang', array(
            'status' => $status
        ));
    }

    public function update($data)
    {
        extract($data);
        $this->db->where('id', $id);
        $this->db->update('barang', array(
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $jumlah_barang,
            'harga_barang' => $harga_barang
        ));
    }
}
