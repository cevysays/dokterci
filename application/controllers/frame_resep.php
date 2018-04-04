<?php 


/**
* 
*/
class frame_resep extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
	}

	function index($noreg,$idpasien)
	{
		$data['item'] =[
			'noreg'=>$noreg,
			'idpasien'=>$idpasien,
		];

		
		
		$this->load->view('resep',$data);
	}

}