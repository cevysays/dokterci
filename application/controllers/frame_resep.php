<?php 


/**
* 
*/
class frame_resep extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_terapi','terapi');
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
	}

	function index($noreg,$idpasien)
	{
		$data['item'] =[
			'noreg'=>$noreg,
			'idpasien'=>$idpasien,
		];

		$data['query'] = $this->terapi->tampil_resep($noreg,$idpasien);

// print_r($data);
// exit();
		
		$this->load->view('resep',$data);
	}

}