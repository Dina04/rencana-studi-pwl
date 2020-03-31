<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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
        $data['title'] = 'List Mahasiswa';
        $result =  $this->curl->simple_get($this->API . '/mahasiswa');
        $data['mahasiswa'] = json_decode($result, true);
        if ($this->session->userdata('level') == "admin") {
            $this->load->view('user/admin/header', $data);
            $this->load->view('mahasiswa/index', $data);
            $this->load->view('user/footer');
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                redirect('user/index');
            } else {
                $this->load->view('user/header_login', $data);
                $this->load->view('mahasiswa/index', $data);
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
                    'nim'       =>  $this->input->post('nim'),
                    'nama'      =>  $this->input->post('nama'),
                    'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                    'alamat' =>  $this->input->post('alamat'),
                    'jurusan' =>  $this->input->post('jurusan')
                );
                $insert =  $this->curl->simple_post($this->API . '/mahasiswa', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($insert) {
                    $this->session->set_flashdata('hasil', 'Tambah Data Mahasiswa Berhasil');
                } else {
                    $this->session->set_flashdata('hasil', 'Tambah Data Mahasiswa Gagal');
                }
                redirect('mahasiswa');
            } else {
                $data['title'] = "Form Menambahkan Data Mahasiswa";
                $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
                $this->load->view('user/header_login', $data);
                $this->load->view('mahasiswa/tambah', $data);
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                redirect('user/index');
            } else {
                if (isset($_POST['submit'])) {
                    $data = array(
                        'nim'       =>  $this->input->post('nim'),
                        'nama'      =>  $this->input->post('nama'),
                        'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                        'alamat' =>  $this->input->post('alamat'),
                        'jurusan' =>  $this->input->post('jurusan')
                    );
                    $insert =  $this->curl->simple_post($this->API . '/mahasiswa', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if ($insert) {
                        $this->session->set_flashdata('hasil', 'Tambah Data Berhasil');
                    } else {
                        $this->session->set_flashdata('hasil', 'Tambah Data Gagal');
                    }
                    redirect('mahasiswa');
                } else {
                    $data['title'] = "Form Menambahkan Data Mahasiswa";
                    $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
                    $this->load->view('user/header_login', $data);
                    $this->load->view('mahasiswa/tambah', $data);
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
                    'id_mahasiswa'       =>  $this->input->post('id_mahasiswa'),
                    'nim'      =>  $this->input->post('nim'),
                    'nama'      =>  $this->input->post('nama'),
                    'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                    'alamat' =>  $this->input->post('alamat'),
                    'jurusan' =>  $this->input->post('jurusan')
                );
                $update =  $this->curl->simple_put($this->API . '/mahasiswa', $data, array(CURLOPT_BUFFERSIZE => 10));
                if ($update) {
                    $this->session->set_flashdata('hasil', 'Update Data Mahasiswa Berhasil');
                } else {
                    $this->session->set_flashdata('hasil', 'Update Data Mahasiswa Gagal');
                }
                redirect('mahasiswa');
            } else {
                $data['mahasiswa'] = json_decode($this->curl->simple_get($this->API . '/mahasiswa?id_mahasiswa=' . $id));
                $data['title'] = "Form Edit Data Mahasiswa";
                $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
                $this->load->view('user/header_login', $data);
                $this->load->view('mahasiswa/edit', $data);
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('jabatan') == "dosen") {
                redirect('user/index');
            } else {
                if (isset($_POST['submit'])) {
                    $data = array(
                        'id_mahasiswa'       =>  $this->input->post('id_mahasiswa'),
                        'nim'      =>  $this->input->post('nim'),
                        'nama'      =>  $this->input->post('nama'),
                        'jeniskelamin'      =>  $this->input->post('jeniskelamin'),
                        'alamat' =>  $this->input->post('alamat'),
                        'jurusan' =>  $this->input->post('jurusan')
                    );
                    $update =  $this->curl->simple_put($this->API . '/mahasiswa', $data, array(CURLOPT_BUFFERSIZE => 10));
                    if ($update) {
                        $this->session->set_flashdata('hasil', 'Update Data Mahasiswa Berhasil');
                    } else {
                        $this->session->set_flashdata('hasil', 'Update Data Mahasiswa Gagal');
                    }
                    redirect('mahasiswa');
                } else {
                    $data['mahasiswa'] = json_decode($this->curl->simple_get($this->API . '/mahasiswa?id_mahasiswa=' . $id));
                    $data['title'] = "Form Edit Data Mahasiswa";
                    $data['jurusan'] = ['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
                    $this->load->view('user/header_login', $data);
                    $this->load->view('mahasiswa/edit', $data);
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
                redirect('mahasiswa');
            } else {
                $delete =  $this->curl->simple_delete($this->API . '/mahasiswa?id_mahasiswa=', array('id_mahasiswa' => $id), array(CURLOPT_BUFFERSIZE => 10));
                if ($delete) {
                    $this->session->set_flashdata('hasil', 'Delete Data Mahasiswa Gagal');
                } else {
                    $this->session->set_flashdata('hasil', 'Delete Data Mahasiswa Berhasil');
                }
                redirect('mahasiswa');
            }
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                redirect('user/index');
            } else {
                if (empty($id)) {
                    redirect('mahasiswa');
                } else {
                    $delete =  $this->curl->simple_delete($this->API . '/mahasiswa?id_mahasiswa=', array('id_mahasiswa' => $id), array(CURLOPT_BUFFERSIZE => 10));
                    if ($delete) {
                        $this->session->set_flashdata('hasil', 'Delete Data Mahasiswa Gagal');
                    } else {
                        $this->session->set_flashdata('hasil', 'Delete Data Mahasiswa Berhasil');
                    }
                    redirect('mahasiswa');
                }
            }
        } else {
            redirect('auth');
        }
    }
}
