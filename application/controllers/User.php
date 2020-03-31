<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        //digunakan untuk menjalankan fungsi construct pada class parrent(ci_controller)
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('User_model');

        if ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        if ($this->session->userdata('level') == "admin") {
            $data['title'] = 'Halaman Admin';
            $this->load->view('user/admin/header', $data);
            $this->load->view('user/index');
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                $data['title'] = 'Halaman Mahasiswa';
                $this->load->view('user/mahasiswa/header', $data);
                $this->load->view('user/index');
            } else {
                $data['title'] = 'Halaman Admin';
                $this->load->view('user/admin/header', $data);
                $this->load->view('user/index');
            }
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Form Edit User';
        $data['status'] = ['Aktif', 'Tidak Aktif'];
        $data['user'] = $this->User_model->getUserById($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header_login', $data);
            $this->load->view('user/edit', $data);
        } else {
            $this->User_model->ubahDataUser();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('user/list_user', 'refresh');
        }
    }

    public function list_user()
    {
        if ($this->session->userdata('level') == "user") {
            redirect('user', 'refresh');
        } elseif ($this->session->userdata('level') == "admin") {
            $data['title'] = 'Data Admin';
            $data['user'] = $this->User_model->datatabels();
            if ($this->input->post('keyword')) {
                $data['user'] = $this->User_model->cariDataUser();
            }
            $this->load->view('user/admin/header_login', $data);
            $this->load->view('user/list', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapusDataUser($id)
    {

        $this->User_model->hapusDataUser($id);
        $this->session->flashdata('flash-data-hapus', 'Dihapus');
        redirect('user/list_user', 'refresh');
    }
}
