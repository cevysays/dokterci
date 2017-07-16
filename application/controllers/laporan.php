<?php

class Laporan extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_laporan','laporan');
	}


	function index(){

		if(isset($_POST['submit'])){
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');
			$tampil = $this->input->post('tampil');

			$data['query'] = $this->laporan->tampil_pasien($dari, $sampai);
			$data['dari'] = $dari;
			$data['sampai'] = $sampai;
			
			if($tampil == "web"){
				$this->load->view('head');
				$this->load->view('laporan/laporan_pasien_view', $data);
				$this->load->view('foot');
			}else{
				$this->load->view('laporan/laporan_pasien_cetak', $data);
			}

		}else{
			$this->load->view('head');
			$this->load->view('laporan/laporan_form');
			$this->load->view('foot');
		}
	}
//end of class
}	