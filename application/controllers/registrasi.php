<?php

class Registrasi extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_registrasi','registrasi');
		$this->load->model('m_pasien','pasien');
	}


	function index(){
		$data['query'] = $this->registrasi->tampil_registrasi();

		$this->load->view('head');
		$this->load->view('registrasi/reg_view', $data);
		$this->load->view('foot');
	}


	function daftar($id){

		
		if(!$id){
			echo 'Parameter Error';
		}else{
			if(isset($_POST['submit'])){

				$idreg = $this->input->post('idreg');
				$idpasien = $id;
				$keluhan = $this->input->post('keluhan');
				$tgl = date('Y-m-d');
				$divisi = $this->input->post('divisi');

				$data = array(
					'no_reg'=>
					preg_replace('/\D/', '', $idreg),
					'pasien_id'=>$idpasien,
					'tgl_reg'=>$tgl,
					'keluhan'=>$keluhan,
					'divisi'=>$divisi
					);


				$this->registrasi->simpan_data($data);
				$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Pasien berhasil didaftarkan.</div>');
				redirect('registrasi');
			}else{
				$data['query'] = $this->pasien->ambil_pasien($id);
				$data['kode'] = $this->registrasi->kode();

				$this->load->view('head');
	    		$this->load->view('registrasi/reg_daftar', $data);
	    		$this->load->view('foot');
			}
		}
	}


//end of class
}	