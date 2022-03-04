<?php
class Penjualan_Controller extends CI_Controller
{
    public function index()
    {
        $data['_view'] = "penjualan/index";
        $data['penjualan'] = $this->penjualan->getAllPenjualan($this->input->get('start_date'), $this->input->get('end_date'));
        $this->load->view('layouts/index', $data);
    }

    public function halamanTambah()
    {
        $data['_view'] = "penjualan/create";
        $data['barang'] = $this->barang->getAllBarangForPenjualan();
        $this->load->view('layouts/index', $data);
    }

    function checkStok($id)
    {
        $data['barang'] = $this->barang->getBarang($id);
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function storePenjualan()
    {
        $penjualan_id = $this->penjualan->addPenjualanOrder($this->input->post('penjualan'));
        $this->detail_penjualan->addDetailPenjualanOrder($this->input->post('penjualanOrder'), $penjualan_id);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'Message' => "Berhasil Menambahkan Penjualan",
                'Status' => TRUE
            ]));
    }

    public function halamanEdit($id)
    {
        $data['_view'] = "penjualan/edit";
        $data['penjualan'] = json_encode($this->penjualan->editPenjualan($id));
        $data['barang'] = $this->barang->getAllBarangForPenjualan();
        $data['nama_pembeli'] = $this->penjualan->getNamaPembeli($id);
        $this->load->view('layouts/index', $data);
    }

    public function updatePenjualan($id)
    {
        $this->penjualan->updatePenjualan($this->input->post('penjualan'), $id);
        $this->detail_penjualan->updateDetailPenjualanOrder($this->input->post('penjualanOrder'), $id);

        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'Message' => "Berhasil Mengubah Penjualan",
                'Status' => TRUE
            ]));
    }

    public function delete($id)
    {
        $this->session->set_flashdata("hapus_penjualan", $this->penjualan->delete($id));
        redirect('penjualan_controller/index');
    }

    public function printPenjualan($id)
    {
        $data['namaPembeli'] = $this->penjualan->getNamaPembeli($id);
        $data['penjualan'] = $this->penjualan->getPenjualanPerId($id);
        $this->load->view('penjualan/printeachone', $data);
    }
}
