<?php

/**
 *
 */
class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['armada'] = $this->all_model->get_armada_limit(array(), 'armada');
    $this->load->view('header_user');
    $this->load->view('beranda', $data);
    $this->load->view('footer_user');
  }

}

?>
