<?php
class M_sk_ktp extends CI_Model {
    

    function get_data_warga_bynik($nik){
        $hsl=$this->db->query("SELECT * FROM warga JOIN kk ON kk.no_kk=warga.no_kk WHERE nik='$nik'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'nik' => $data->nik,
			        'nama_lengkap' => $data->nama_lengkap,
			        'tempat_lahir' => $data->tempat_lahir,
                    'tanggal_lahir' => $data->tanggal_lahir,
                    'jenis_kelamin' => $data->jenis_kelamin,
                    'jenis_pekerjaan' => $data->jenis_pekerjaan,
                    'kewarganegaraan' => $data->kewarganegaraan,
                    'status_perkawinan' => $data->status_perkawinan,
			        'agama' => $data->agama,
                    'dusun' => $data->dusun,
                    'rt' => $data->rt,
                    'rw' => $data->rw,
                    );
            }
        }
        return $hasil;
    }
    function tambah_data() {
        $tanggal_surat = date("Y-m-d");
		$data = array (
			'no_surat' => $this->input->post('no_surat'),
			'nama_surat' => $this->input->post('nama_surat'),
			'tanggal_surat' => $this->input->post('tanggal_surat', $tanggal_surat)
		);

		$this->db->insert('surat', $data);
		redirect('../sk_ktp');
    }
    
    function cek_nosurat($no_surat) {
		$query = array('no_surat' => $no_surat);
		return $this->db->get_where('surat', $query);
	}	

}
