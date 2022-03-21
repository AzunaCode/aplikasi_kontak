<?php
class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kontak');
    }
    public function index()
    {
        $data['kontak'] = $this->M_kontak->getContact();
        $this->load->view('v_kontak', $data);
    }
    public function tambahdata()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'profil' => $this->input->post('foto'),
            'email' => $this->input->post('email'),
        );
        $this->db->insert('contact', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Berhasil Tambah data</div>');
        redirect('contact', 'refresh');
    }

    public function Editdata()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'profil' => $this->input->post('foto'),
            'email' => $this->input->post('email'),
        );
        $this->db->insert('contact', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Berhasil Tambah data</div>');
        redirect('contact', 'refresh');
    }
}
