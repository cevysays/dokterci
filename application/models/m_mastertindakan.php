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
			'kode_tindakan',
			'nama_tindakan',
			'biaya',
			), FALSE);
		
		$this->db->order_by('kode_tindakan', 'DESC');
		$query = $this->db->get('master_tindakan',$num, $offset);

		return $query->result();
	}

	function update_mastertindakan($data, $kode_tindakan){
		$this->db->where('kode_tindakan', $kode_tindakan);
		$this->db->update('master_tindakan', $data);
	}

	function ambil_mastertindakan($id){
		$query = $this->db->get_where('master_tindakan', array('kode_tindakan'=>$id));

		return $query->row();
	}

	function hapus_mastertindakan($kode_tindakan){
		$this->db->where('kode_tindakan', $kode_tindakan);
		$this->db->delete('master_tindakan');
	}

	function cetak_mastertindakan(){

		$this->db->select('*');

		$query = $this->db->get('master_tindakan');
		return $query->result();

	}

}