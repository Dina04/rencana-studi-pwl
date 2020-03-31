<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('curl');
        $this->API = "http://localhost/CI/sistem_penilaian/Api";
    }

    public function index()
    {
        $data['title'] = 'List Dosen';
        $result =  $this->curl->simple_get($this->API . '/dosen');
        $data['dosen'] = json_decode($result, true);
        if ($this->session->userdata('level') == "admin") {
            $this->load->view('user/admin/header', $data);
            $this->load->view('dosen/index', $data);
            $this->load->view('user/footer');
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                $this->load->view('user/mahasiswa/header', $data);
                $this->load->view('dosen/index', $data);
                $this->load->view('user/footer');
            } else {
                $this->load->view('user/header_login', $data);
                $this->load->view('dosen/index', $data);
                $this->load->view('user/footer');
            }
        } else {
            redirect('auth');
        }
    }
    public function tambah()
    {
        if ($this->session->userdata('level') == "admin") {
            if (isset($_POST['submit'])) {
                $data = array(
                    'nip'       =>  $this->input->post('nip'),
                    'nama_dosen'      =>  $this->input->post('nama_dosen'),
                    'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                    'alamat'      =>  $this->input->post('alamat'),
                    'email' =>  $this->input->post('email'),
                );
                $insert =  $this->curl->simple_post($this->API . '/dosen', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($insert) {
                    $this->session->set_flashdata('hasil', 'Tambah Data Dosen Berhasil');
                } else {
                    $this->session->set_flashdata('hasil', 'Tambah Data Dosen Gagal');
                }
                redirect('dosen');
            } else {
                $data['title'] = "Form Menambahkan Data Dosen";
                $this->load->view('user/header_login', $data);
                $this->load->view('dosen/tambah');
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                redirect('user/index');
            } else {
                if (isset($_POST['submit'])) {
                    $data = array(
                        'nip'       =>  $this->input->post('nip'),
                        'nama_dosen'      =>  $this->input->post('nama_dosen'),
                        'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                        'alamat'      =>  $this->input->post('alamat'),
                        'email' =>  $this->input->post('email'),
                    );
                    $insert =  $this->curl->simple_post($this->API . '/dosen', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if ($insert) {
                        $this->session->set_flashdata('hasil', 'Tambah Data Dosen Berhasil');
                    } else {
                        $this->session->set_flashdata('hasil', 'Tambah Data Dosen Gagal');
                    }
                    redirect('dosen');
                } else {
                    $data['title'] = "Form Menambahkan Data Dosen";
                    $this->load->view('user/header_login', $data);
                    $this->load->view('dosen/tambah');
                }
            }
        } else {
            redirect('auth');
        }
    }
    public function edit($id)
    {
        if ($this->session->userdata('level') == "admin") {
            if (isset($_POST['submit'])) {
                $data = array(
                    'id_dosen'       =>  $this->input->post('id_dosen'),
                    'nip'       =>  $this->input->post('nip'),
                    'nama_dosen'      =>  $this->input->post('nama_dosen'),
                    'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                    'alamat'      =>  $this->input->post('alamat'),
                    'email' =>  $this->input->post('email'),
                );
                $update =  $this->curl->simple_put($this->API . '/dosen', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($update) {
                    $this->session->set_flashdata('hasil', 'Update Data Dosen Berhasil');
                } else {
                    $this->session->set_flashdata('hasil', 'Update Data Dosen Gagal');
                }
                redirect('dosen');
            } else {
                $data['dosen'] = json_decode($this->curl->simple_get($this->API . '/dosen?id_dosen=' . $id));
                $data['title'] = "Form Edit Data Dosen";
                $this->load->view('user/header_login', $data);
                $this->load->view('dosen/edit');
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "dosen") {
                redirect('user/index');
            } else {
                if (isset($_POST['submit'])) {
                    $data = array(
                        'id_dosen'       =>  $this->input->post('id_dosen'),
                        'nip'       =>  $this->input->post('nip'),
                        'nama_dosen'      =>  $this->input->post('nama_dosen'),
                        'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                        'alamat'      =>  $this->input->post('alamat'),
                        'email' =>  $this->input->post('email'),
                    );
                    $update =  $this->curl->simple_put($this->API . '/dosen', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if ($update) {
                        $this->session->set_flashdata('hasil', 'Update Data Dosen Berhasil');
                    } else {
                        $this->session->set_flashdata('hasil', 'Update Data Dosen Gagal');
                    }
                    redirect('dosen');
                } else {
                    $data['dosen'] = json_decode($this->curl->simple_get($this->API . '/dosen?id_dosen=' . $id));
                    $data['title'] = "Form Edit Data Dosen";
                    $this->load->view('user/header_login', $data);
                    $this->load->view('dosen/edit');
                }
            }
        } else {
            redirect('auth');
        }
    }
    public function hapus($id)
    {
        if ($this->session->userdata('level') == "admin") {
            if (empty($id)) {
                redirect('dosen');
            } else {
                $delete =  $this->curl->simple_delete($this->API . '/dosen?id_dosen=', array('id_dosen' => $id), array(CURLOPT_BUFFERSIZE => 10));
                if ($delete) {
                    $this->session->set_flashdata('hasil', 'Delete Data Dosen Gagal');
                } else {
                    $this->session->set_flashdata('hasil', 'Delete Data Dosen Berhasil');
                }
                redirect('dosen');
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                redirect('user/index');
            } else {
                if (empty($id)) {
                    redirect('dosen');
                } else {
                    $delete =  $this->curl->simple_delete($this->API . '/dosen?id_dosen=', array('id_dosen' => $id), array(CURLOPT_BUFFERSIZE => 10));
                    if ($delete) {
                        $this->session->set_flashdata('hasil', 'Delete Data Dosen Gagal');
                    } else {
                        $this->session->set_flashdata('hasil', 'Delete Data Dosen Berhasil');
                    }
                    redirect('dosen');
                }
            }
        } else {
            redirect('auth');
        }
    }
}
