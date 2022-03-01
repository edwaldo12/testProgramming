<?php

class Barang_Model extends CI_Model
{
    public function getAllBarang()
    {
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
        return $this->db->delete('barang', array('id' => $data));
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
