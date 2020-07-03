<?php
class M_history extends CI_Model {
	function tampil_data() {
		return $this->db->get('surat');
	}

	function get_data_detail($no_kk) {
		$arr = array('no_kk', 'nama_kk', 'dusun', 'rt', 'rw');
		foreach ($arr as $key => $val) $data[$val] = null;

		$this->db->where(array('no_kk'=> $no_kk));
		$query = $this->db->get('kk');
		foreach ($query->result() as $row) {
			foreach ($arr as $key => $val) $data[$val] = $row->$val;
		}

		return $data;
	}

	function tambah_data() {
		$data = array (
			'no_kk' => $this->input->post('no_kk'),
			'nama_kk' => $this->input->post('nama_kk'),
			'dusun' => $this->input->post('dusun'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw')
		);

		$this->db->insert('kk', $data);
		redirect('../data_kk');
	}
		
	function ubah_data($no_kk){
		$data = array (
			'nama_kk' => $this->input->post('nama_kk'),
			'dusun' => $this->input->post('dusun'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw')
		);
        $this->db->where(array('no_kk'=> $no_kk));
        $this->db->update('kk', $data);
    	redirect('../data_kk');
    }
    
    function hapus_data($no_kk){
        $this->db->where(array('no_kk' => $no_kk));
        $this->db->delete('kk');
    	redirect('../data_kk');
    }
    function cek_nokk($no_kk) {
		$query = array('no_kk' => $no_kk);
		return $this->db->get_where('kk', $query);
	}	
}	