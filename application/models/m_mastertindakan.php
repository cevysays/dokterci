<?php
class M_mastertindakan extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function simpan($data){
		$this->db->insert('master_tindakan', $data);
	}

	function tampil_mastertindakan($num, $offset){
		$this->db->select(array(
			'tindakan_id',
			'kode_tindakan',
			'nama_tindakan',
			'biaya',
			), FALSE);
		
		$this->db->order_by('kode_tindakan', 'DESC');
		$query = $this->db->get('master_tindakan',$num, $offset);

		return $query->result();
	}

	function update_mastertindakan($data, $tindakan_id){
		$this->db->where('tindakan_id', $tindakan_id);
		$this->db->update('master_tindakan', $data);
	}

	function ambil_mastertindakan($id){
		$query = $this->db->get_where('master_tindakan', array('tindakan_id'=>$id));

		return $query->row();
	}

	function hapus_mastertindakan($tindakan_id){
		$this->db->where('tindakan_id', $tindakan_id);
		$this->db->delete('master_tindakan');
	}

	function cetak_mastertindakan(){

		$this->db->select('*');

		$query = $this->db->get('master_tindakan');
		return $query->result();

	}

}