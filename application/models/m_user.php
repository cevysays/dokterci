<?php 

class M_user extends CI_Model{

	function __construct(){
		parent::__construct();
	}


	function ambil_pengguna($username){
		$query = $this->db->get_where('users', array('username'=>$username));

		return $query->row();
	}


	function update_user($data, $username){
		$this->db->where('username', $username);
		$this->db->update('users', $data);
	}
//end of class
}	