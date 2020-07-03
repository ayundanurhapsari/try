<?php

/**
 *
 */
class Kontak extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('header_user');
    $this->load->view('kontak_view');
    $this->load->view('footer_user');
  }

}

 ?>
