<?php

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_user','user');
	}


	function index(){
		echo 'Underconstruction';
	}


	function profil(){
		$user = $this->session->userdata('username');

		if(isset($_POST['submit'])){

			$password = trim($this->input->post('password'));
			$passlagi = trim($this->input->post('passlagi'));

			if($password <> $passlagi){
				$this->session->set_flashdata('pesan','<div id="pesan" class="alert alert-danger"><b>Error!</b> Password harus sama.</div>');
				redirect('user/profil');
			}else{
				$data = array('password'=>md5($password));
				$this->user->update_user($data, $user);
				redirect('auth/logout');
				$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Password berhasil diubah.</div>');

			}

		}else{
			$data['query'] = $this->user->ambil_pengguna($user);

			$this->load->view('head');
			$this->load->view('user/user_profil', $data);
			$this->load->view('foot');
		}
	}
//end of class
}	