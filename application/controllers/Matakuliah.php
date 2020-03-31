<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
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
        $data['title'] = 'List Matakuliah';
        $result =  $this->curl->simple_get($this->API . '/matakuliah');
        $data['matakuliah'] = json_decode($result, true);
        if ($this->session->userdata('level') == "admin") {
            $this->load->view('user/admin/header', $data);
            $this->load->view('matakuliah/index', $data);
            $this->load->view('user/footer');
        } elseif ($this->session->userdata('level') == "user") {
            if ($this->session->userdata('status') == "mahasiswa") {
                $this->load->view('user/mahasiswa/header', $data);
                $this->load->view('matakuliah/index', $data);
                $this->load->view('user/footer');
            } else {
                $this->load->view('user/header_login', $data);
                $this->load->view('matakuliah/index', $data);
                $this->load->view('user/footer');
            }
        } else {
            redirect('auth');
        }
    }
}
