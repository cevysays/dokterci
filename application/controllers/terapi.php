<?php

class Terapi extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_terapi','terapi');
		$this->load->model('m_registrasi', 'registrasi');
		$this->load->model('m_pasien', 'pasien');
		$this->load->model('m_pengguna', 'pengguna');
		$this->load->model('m_masterdiagnosa', 'diagnosa');
		$this->load->model('m_mastertindakan', 'tindakan');
	}


	function index(){
		$data['query'] = $this->registrasi->tampil_registrasi();

		$this->load->view('head');
		$this->load->view('terapi/terapi_view', $data);
		$this->load->view('foot');
	}


	function periksa($noreg, $nomerekammedis){


			//print_r($noreg);
			//print_r($nomerekammedis);exit();

		if(isset($_POST['submit'])){

			$data = array('status'=>1);

			$array =[
				'no_reg'=>$this->input->post('noreg'),
				'id_user'=>$this->input->post('tampil'),
				'tanggal_periksa'=>date('Y-m-d'),
			];

			$this->terapi->amburadul_data('diperiksa_oleh',$array);

			$this->terapi->selesai_periksa($data, $noreg);
			redirect('terapi/cetak/'.$noreg.'/'.$nomerekammedis);

		}
		$data['pasien'] = $this->terapi->ambil_data_pasien($nomerekammedis,$noreg);
		$data['dokter'] = $this->pengguna->get_users_by_role('dokter');
		$data['list_diagnosa'] = $this->diagnosa->tampil_masterdiagnosa();
		$data['list_tindakan'] = $this->tindakan->tampil_mastertindakan();

		$this->load->view('head');
		$this->load->view('terapi/terapi_periksa', $data);
		$this->load->view('foot');


	}


	function cetak($noreg, $pasien){
		$data['pasien'] = $this->terapi->ambil_data_pasien($pasien,$noreg);
		$data['tindakan'] = $this->terapi->tampil_tindakan($noreg);
		$data['diagnosa'] = $this->terapi->tampil_diagnosa($noreg);
		$data['terapi'] = $this->terapi->tampil_terapi($noreg);
		$data['dokter'] = $this->terapi->dokter($noreg);

		$this->load->view('terapi/cetak_terapi', $data);
	}


	function history(){
		$get = $this->db->get('registrasi');

		$config['base_url'] = site_url().'/pasien/history';
		$config['per_page'] = 20;
		$config['total_rows'] = $get->num_rows();
		$config['next_page'] = '&raquo;';
		$config['prev_page'] = '&laquo;';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';

		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['query'] = $this->terapi->tampil_history($config['per_page'], $this->uri->segment(3));

		$this->load->view('head');
		$this->load->view('terapi/terapi_history_view', $data);
		$this->load->view('foot');
	}



	function detailhistory($pasien){
		$data['pasien'] = $this->terapi->ambil_data_pasien($pasien,null);
		$data['keluhan'] = $this->terapi->tampil_history_keluhan($pasien);
		$data['diagnosa'] = $this->terapi->tampil_history_diagnosa($pasien);
		$data['tindakan'] = $this->terapi->tampil_history_tindakan($pasien);
		$data['terapi'] = $this->terapi->tampil_history_terapi($pasien);

		$this->load->view('head');
		$this->load->view('terapi/terapi_history_detail', $data);
		$this->load->view('foot');
	}


	function cetakhistory($pasien){

	/*	$data['pasien'] = $this->terapi->ambil_data_pasien($pasien);
		$data['keluhan'] = $this->terapi->tampil_history_keluhan($pasien);
		$data['diagnosa'] = $this->terapi->tampil_history_diagnosa($pasien);
		$data['tindakan'] = $this->terapi->tampil_history_tindakan($pasien);
		$data['terapi'] = $this->terapi->tampil_history_terapi($pasien);
		$this->load->view('terapi/terapi_history_cetak', $data);*/

		$data['pasien'] = $this->terapi->ambil_data_pasien($pasien);
		$data['keluhan'] = $this->terapi->tampil_history_keluhan($pasien);
		$data['diagnosa'] = $this->terapi->tampil_history_diagnosa($pasien);
		$data['tindakan'] = $this->terapi->tampil_history_tindakan($pasien);
		$data['terapi'] = $this->terapi->tampil_history_terapi($pasien);

		//$this->load->view('head');
		$this->load->view('terapi/terapi_history_cetak', $data);
    	//$this->load->view('foot');
	}



	/**
	* =================================
	* @@ Function simpan diagnosa jquery
	*
	**/
	function tambahdiagnosa(){
		

			$data = array(
				'no_reg'=>$this->input->post('noreg'),
				'pasien_id'=>$this->input->post('pasien'),
				'diagnosa'=>$this->input->post('diagnosa'),
				'tanggal_periksa'=>date('Y-m-d'),
			);

			$this->terapi->amburadul_data('diagnosa',$data);

	}


	function tampildiagnosa($noreg){
		$data['query'] = $this->terapi->tampil_diagnosa($noreg);

		$this->load->view('terapi/tampil_diagnosa', $data);
	}


	function hapusdiagnosa($noreg, $pasien_id, $diagnosa, $tanggal_periksa)
	{
		$this->terapi->hapus_diagnosa($noreg, $pasien_id, $diagnosa, $tanggal_periksa);
	}



	/**
	* =================================
	* @@ Function simpan tindakan jquery
	*
	**/
	function tambahtindakan(){

		$data = array(
			'no_reg'=>$this->input->post('noreg'),
			'pasien_id'=>$this->input->post('pasien'),
			'tindakan'=>$this->input->post('tindakan'),
			'tanggal_periksa'=>date('Y-m-d'),
		);

		$this->terapi->amburadul_data('tindakan',$data);
	}


	function tampiltindakan($noreg){
		$data['query'] = $this->terapi->tampil_tindakan($noreg);

		$this->load->view('terapi/tampil_tindakan', $data);
	}


	function hapustindakan($noreg, $pasien_id, $tindakan, $tanggal_periksa){
		$this->terapi->hapus_tindakan($noreg, $pasien_id, $tindakan, $tanggal_periksa);
	}


	/**
	* =================================
	* @@ Function simpan terapi jquery
	*
	**/
	function tambahterapi(){
		die('die');
		$obat = $this->input->post('obat');
		$etiket = $this->input->post('etiket');
		$jml = $this->input->post('jml');
		$noreg = $this->input->post('noreg');
		$pasien = $this->input->post('pasien');
		$tgl = date('Y-m-d');

    //disini upload file
            $this->load->library('upload'); //panggil libary upload

            $extension = pathinfo($_FILES['resep']['name'], PATHINFO_EXTENSION);
            

            $namafile                = "file_" . $nama.'_'.time().'.'.$extension; //nama file + fungsi time
            $config['upload_path']   = FCPATH.'assets/img/resep'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size']      = '3072'; //maksimum besar file 3M
            $config['max_width']     = '5000'; //lebar maksimum 5000 px
            $config['max_height']    = '5000'; //tinggi maksimu 5000 px
            $config['file_name']     = $namafile; //nama yang terupload nantinya

            $this->upload->initialize($config); //initialisasi upload dari array config
            $file_image_poto = $this->upload->data();

            $this->upload->do_upload('resep');

		$data = array(
			'no_reg'=>$noreg,
			'no_rm'=>$pasien,
			'terapi'=>$obat,
			'etiket'=>$etiket,
			'jml'=>$jml,
			'tgl'=>$tgl,
			'resep'=>$file_image_poto['file_name']
		);

		$this->terapi->simpan_data('terapi',$data);
	}


	function tampilterapi($noreg){
		$data['query'] = $this->terapi->tampil_terapi($noreg);

		$this->load->view('terapi/tampil_terapi', $data);
	}


	function hapusterapi($id){
		$this->terapi->hapus_terapi($id);
	}

	function get_diagnosa($keyword = '')
	{
		$data['diagnosa'] = $this->diagnosa->cari_diagnosa($keyword);
		echo json_encode($data);
		// echo "<pre>";
		// print_r($x);
		// echo "</pre>";
	}


	 public function uploadgambar(){

        //disini upload file
			$this->load->library('upload'); //panggil libary upload

			$extension = pathinfo($_FILES['resep']['name'], PATHINFO_EXTENSION);

            $namafile                = "file" .'_'.time().'.'.$extension; //nama file + fungsi time
            $config['upload_path']   = FCPATH.'assets/img/resep/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name']     = $namafile; //nama yang terupload nantinya

            $this->upload->initialize($config); //initialisasi upload dari array config
            $file_image_poto = $this->upload->data();

            $this->upload->do_upload('resep');

            $data = array(
            	'resep'=>$file_image_poto['file_name'],
            	'no_reg'=>$this->input->post('noreg'),
            	'no_rm'=>$this->input->post('idpasien'),
            	'tgl'=> date('Y-m-d'),
            	);

            $this->terapi->simpan_resep($data);

            redirect('frame_resep/index/'.$this->input->post('noreg').'/'.$this->input->post('idpasien'), 'refresh');

    }
 

//end of class
}
