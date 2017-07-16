<?php

class Depan extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
	}


	function index(){
		$this->load->view('head');
		$this->load->view('home');
		$this->load->view('foot');
	}

//end of class	
}