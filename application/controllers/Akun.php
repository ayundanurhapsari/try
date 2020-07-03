<?php

/**
 *
 */
class Akun extends CI_Controller {

  public function __construct() {
    parent::__construct();
    if (empty($this->session->userdata('is_login'))) {
      echo '<script>alert("anda harus login");window.location.href="'.base_url('login').'"</script>';
    }
  }

  public function index() {
    $data['penyewaan'] = $this->all_model->get_penyewaan(array('penyewaan.id_user'=>$this->session->userdata('id_user')));
    $data['tujuan'] = $this->all_model->get_tujuan(array('tujuan.id_user'=>$this->session->userdata('id_user')));
    $this->load->view('akun_view', $data);
  }

  public function simpan() {
    $id_user = $this->input->post('id_user');
    $nama    = $this->input->post('nama');
    $email   = $this->input->post('email');
    $no_telp  = $this->input->post('no_telp');
    $alamat  = $this->input->post('alamat');
    $password  = $this->input->post('password');

    $data_update = $this->all_model->update(
      array(
        'id_user' => $id_user
      ),
      array(
        'nama_lengkap' => $nama,
        'email'        => $email,
        'no_telp'       => $no_telp,
        'alamat'       => $alamat,
        'password'     => $password
      ),
      'user'
    );
    if ($data_update) {
      $this->session->set_flashdata('msg', '<div class="alert alert-success fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Data berhasil diubah</div>');
      $this->session->set_userdata('nama', $nama);
      $this->session->set_userdata('email', $email);
      $this->session->set_userdata('no_telp', $no_telp);
      $this->session->set_userdata('alamat', $alamat);
      $this->session->set_userdata('password', $password);
      redirect('akun');
    }else {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger fade in alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> Data gagal diubah</div>');
      redirect('akun');
    }
  }

}

 ?>
