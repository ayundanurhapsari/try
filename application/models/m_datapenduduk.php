<?php
class M_datapenduduk extends CI_Model {
	function tampil_data() {
		return $this->db->get('warga');
	}

	function tampil_data_kk($no_kk) {
		$this->db->where(array('no_kk'=> $no_kk));
		return $this->db->get('warga');
	}

	function tampil_data_cari($nama_lengkap) {
		$this->db->like(array('nama_lengkap'=> $nama_lengkap));
		return $this->db->get('warga');
		redirect('data_penduduk/detail?nama_lengkap='.$this->input->post('nama_lengkap'));
	}

	function tambah_data() {
		$data = array (
			'nik' => $this->input->post('nik'),
			'no_kk' => $this->input->post('no_kk'),	
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'pendidikan' => $this->input->post('pendidikan'),
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'status_perkawinan' => $this->input->post('status_perkawinan'),
			'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'no_paspor' => $this->input->post('no_paspor'),
			'no_kitas' => $this->input->post('no_kitas'),			
			'nama_ayah' => $this->input->post('nama_ayah'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'nik_ayah' => $this->input->post('nik_ayah'),
			'nik_ibu' => $this->input->post('nik_ibu')
		);

		$this->db->insert('warga', $data);
		redirect('data_penduduk/detail?no_kk='.$this->input->post('no_kk'));
	}
		
	function ubah_data($nik){
        $data = array(
			'no_kk' => $this->input->post('no_kk'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'agama' => $this->input->post('agama'),
			'pendidikan' => $this->input->post('pendidikan'),
			'jenis_pekerjaan' => $this->input->post('jenis_pekerjaan'),
			'status_perkawinan' => $this->input->post('status_perkawinan'),
			'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'no_paspor' => $this->input->post('no_paspor'),
			'no_kitas' => $this->input->post('no_kitas'),			
			'nama_ayah' => $this->input->post('nama_ayah'),
			'nama_ibu' => $this->input->post('nama_ibu'),
			'nik_ayah' => $this->input->post('nik_ayah'),
			'nik_ibu' => $this->input->post('nik_ibu')
		);
        $this->db->where(array('nik'=> $nik));
        $this->db->update('warga', $data);
    	redirect('data_penduduk/detail?no_kk='.$this->input->post('no_kk'));
    }
    
    function hapus_data($id_warga){
        $this->db->where(array('nik' => $id_warga));
        $this->db->delete('warga');
    	redirect('data_penduduk');
    }
	function cek_nik($nik) {
		$query = array('nik' => $nik);
		return $this->db->get_where('warga', $query);
	}
}	