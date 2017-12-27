<?php
class M_masterdiagnosa extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function simpan($data){
		$this->db->insert('master_diagnosa', $data);
	}

	function tampil_masterdiagnosa($num, $offset){
		$this->db->select(array(
			'kode_icd',
			'nama_penyakit',
			), FALSE);
		
		$this->db->order_by('kode_icd', 'DESC');
		$query = $this->db->get('master_diagnosa',$num, $offset);

		return $query->result();
	}

	function update_masterdiagnosa($data, $kode_icd){
		$this->db->where('kode_icd', $kode_icd);
		$this->db->update('master_diagnosa', $data);
	}

	function ambil_masterdiagnosa($id){
		$query = $this->db->get_where('master_diagnosa', array('kode_icd'=>$id));

		return $query->row();
	}

	function hapus_masterdiagnosa($kode_icd){
		$this->db->where('kode_icd', $kode_icd);
		$this->db->delete('master_diagnosa');
	}

	function cetak_masterdiagnosa(){

		$this->db->select('*');

		$query = $this->db->get('master_diagnosa');
		return $query->result();

	}

}