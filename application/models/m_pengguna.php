<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_pengguna extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}


	function tampil_pengguna($num, $offset){
		$this->db->order_by('id','DESC');
		$query = $this->db->get('users', $num, $offset);

		return $query->result();
	}


	function simpan_pengguna($data){
		$this->db->insert('users', $data);
	}


	function ambil_pengguna($id){
		$query = $this->db->get_where('users',array(
			'id'=>$id
			));

		return $query->row();
	}


	function ubah_pengguna($data, $id){
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}

	function hapus_pengguna($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
//end of class
}	 