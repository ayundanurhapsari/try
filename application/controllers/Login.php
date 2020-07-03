<?php

/**
 *
 */
class Login extends CI_Controller
{

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('header_user');
    $this->load->view('login_view');
    $this->load->view('footer_user');
  }

  public function aksi_login() {
    $user = $this->all_model->get_where(
      array(
        'email'     => $this->input->post('email'),
        'password'  => $this->input->post('password')
      ),
      'user'
    );
    if (!empty($user)) {
      $this->session->set_userdata('id_user', $user[0]->id_user);
      $this->session->set_userdata('nama_lengkap', $user[0]->nama_lengkap);
      $this->session->set_userdata('email', $user[0]->email);
      $this->session->set_userdata('no_telp', $user[0]->no_telp);
      $this->session->set_userdata('alamat', $user[0]->alamat);
      $this->session->set_userdata('password', $user[0]->password);
      $this->session->set_userdata('is_login', '1');
      $this->session->set_userdata('level', $user[0]->level);
      if ($user[0]->level == '0') {
        redirect('dashboard');
      }else {
        redirect('home');
      }
    }
  }

  public function logout() {
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('no_telp');
    $this->session->unset_userdata('alamat');
    $this->session->unset_userdata('password');
    $this->session->unset_userdata('is_login');
    $this->session->unset_userdata('level');
    redirect('home');
  }
}

 ?>
