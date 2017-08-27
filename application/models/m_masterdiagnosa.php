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
			'icd_diagnosa',
			'nama_penyakit',
			), FALSE);
		
		$this->db->order_by('icd_diagnosa', 'DESC');
		$query = $this->db->get('master_diagnosa',$num, $offset);

		return $query->result();
	}

	function update_masterdiagnosa($data, $icd_diagnosa){
		$this->db->where('icd_diagnosa', $icd_diagnosa);
		$this->db->update('master_diagnosa', $data);
	}

	function ambil_masterdiagnosa($id){
		$query = $this->db->get_where('master_diagnosa', array('icd_diagnosa'=>$id));

		return $query->row();
	}

	function hapus_masterdiagnosa($icd_diagnosa){
		$this->db->where('icd_diagnosa', $icd_diagnosa);
		$this->db->delete('master_diagnosa');
	}

	function cetak_masterdiagnosa(){

		$this->db->select('*');

		$query = $this->db->get('master_diagnosa');
		return $query->result();

	}

}