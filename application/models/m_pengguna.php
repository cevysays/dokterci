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

	/**
	 * [get_user_by_role]
	 * @param  [string] $role (petugas,dokter,admin)
	 * @return [array]
	 */
	function get_users_by_role($role){

		$this->db->order_by('id','DESC');
		$query = $this->db->get_where('users', array('role' => $role));
		return $query->result();
	}
//end of class
}
