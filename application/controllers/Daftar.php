<?php

/**
 *
 */
class Daftar extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('header_user');
    $this->load->view('daftar_view');
    $this->load->view('footer_user');
  }

  public function simpan()  {
    $nama_lengkap = $this->input->post('nama_lengkap');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');

    $data = array(
      'nama_lengkap' => $nama_lengkap,
      'email'        => $email,
      'password'     => $password,
      'alamat'       => $alamat,
      'no_telp'      => $no_telp,
    );
    $a = $this->all_model->insert($data, 'user');
    if ($a) {
      $this->session->set_flashdata('msg', '<div class="alert alert-success">Anda Berhasil mendaftar, silahkan login</div>');
      redirect('daftar');
    }else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger">Anda gagal mendaftar, coba lagi</div>');
      redirect('daftar');
    }
  }
}

 ?>
