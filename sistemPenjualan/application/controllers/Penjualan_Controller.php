<?php
class Penjualan_Controller extends CI_Controller
{
    public function index()
    {
        $data['_view'] = "penjualan/index";
        $data['penjualan'] = $this->penjualan->getAllPenjualan();
        $this->load->view('layouts/index', $data);
    }

    public function halamanTambah()
    {
        $data['_view'] = "penjualan/create";
        $this->load->view('layouts/index', $data);
    }

    public function storeBarang()
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'harga_barang' => $this->input->post('harga_barang')
        ];
        $this->session->set_flashdata("tambah_barang", $this->barang->addNewBarang($data));
        redirect('barang_controller/index');
    }

    public function halamanEdit($id)
    {
        $data['_view'] = "barang/edit";
        $data['barang'] = $this->barang->getBarang($id);
        $this->load->view('layouts/index', $data);
    }
    public function delete($data)
    {
        $this->session->set_flashdata("hapus_barang", $this->barang->delete($data));
        redirect('barang_controller/index');
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'harga_barang' => $this->input->post('harga_barang')
        ];
        $this->session->set_flashdata("update_barang", $this->barang->update($data));
        redirect('barang_controller/index');
    }
}
