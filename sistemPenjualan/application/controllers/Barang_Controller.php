<?php
class Barang_Controller extends CI_Controller
{
    public function index()
    {
        $data['_view'] = "barang/index";
        $data['barang'] = $this->barang->getAllBarang($this->input->get('start_date'), $this->input->get('end_date'));
        $this->load->view('layouts/index', $data);
    }

    public function halamanTambah()
    {
        $data['_view'] = "barang/create";
        $this->load->view('layouts/index', $data);
    }

    public function storeBarang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'nama_barang' => $this->input->post('nama_barang'),
                'jumlah_barang' => $this->input->post('jumlah_barang'),
                'harga_barang' => $this->input->post('harga_barang'),
                'status' => '1'
            ];
            $this->session->set_flashdata("tambah_barang", $this->barang->addNewBarang($data));
            redirect('barang_controller/index');
        } else {
            $data['_view'] = "barang/create";
            $this->load->view('layouts/index', $data);
        }
    }

    public function halamanEdit($id)
    {
        $data['_view'] = "barang/edit";
        $data['barang'] = $this->barang->getBarang($id);
        $this->load->view('layouts/index', $data);
    }

    public function delete($id)
    {
        $data = [
            'id' => $id,
            'status' => '0'
        ];

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
