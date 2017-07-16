<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');

class M_auth extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}



	function cek_pengguna($username, $password){

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status', 1);
		$query = $this->db->get('users');
		return $query;
	}


	function update_data_user($data, $username){
		$this->db->where('username', $username);
		$this->db->update('users', $data);
	}

//end of class
}
?>