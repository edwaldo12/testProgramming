<?php

class Penjualan_Model extends CI_Model
{
    function getAllPenjualan()
    {
        $this->db->select("*");
        $this->db->join("detail_penjualan as dp", "dp.fk_penjualan = p.id");
        $this->db->join("barang as b", "b.id = dp.fk_barang");
        return $this->db->get("penjualan as p")->result_array();
    }
}
