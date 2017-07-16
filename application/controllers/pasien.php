<?php

class Pasien extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) redirect('auth/login');
		$this->load->model('m_pasien','pasien');
	}


	public function index($id=null){
		 //$jml = $this->db->get('pasien');
		$get = $this->db->get('pasien');

		$config['base_url'] = site_url().'/pasien/index';
		
		$config['total_rows'] = $get->num_rows();
		$config['per_page'] = 10;
		$config['next_page'] = '&raquo;';
    	$config['prev_page'] = '&laquo;';
    	$config['first_page'] = 'Awal';
    	$config['last_page'] = 'Akhir';

    	$this->pagination->initialize($config);

    	$data['query'] = $this->pasien->tampil_pasien($config['per_page'],$id );
    	$this->uri->segment(3);

    	$data['halaman'] = $this->pagination->create_links();
    	$this->load->view('head');
    	$this->load->view('pasien/pasien_view', $data);
    	$this->load->view('foot');
	}

	function search_keyword()
    {
        $keyword = $this->input->post('keyword');
        $data['query']  = $this->pasien->search($keyword);
        $this->load->view('head');
        $this->load->view('pasien/cari_pasien',$data);
        $this->load->view('foot');
    }

	function cetak(){
		$data['cetak'] = $this->pasien->cetak_pasien();

		$this->load->view('pasien/cetak_pasien', $data);

		


	}


	function tambah(){
		if(isset($_POST['submit'])){

			$nama = $this->input->post('nama');
			$umur = $this->input->post('umur');
			$alamat = $this->input->post('alamat');
			$telp = $this->input->post('telp');
			$tgl = date('Y-m-d H:i:s');

			$data = array(
				'namalengkap'=>$nama,
				'umur'=>$umur,
				'alamat'=>$alamat,
				'telp'=>$telp,
				'lastinput'=>$tgl
			);

			$this->pasien->simpan_pasien($data);
			$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil disimpan.</div>');
			redirect('pasien');

		}else{
			$this->load->view('head');
    		$this->load->view('pasien/pasien_tambah');
    		$this->load->view('foot');
		}
	}


	function ubah($id=null){
		if(!$id){
			echo 'Parameter Error. Hubungi Administrator Program.';
		}else{
			if(isset($_POST['submit'])){

				$nama = $this->input->post('nama');
				$umur = $this->input->post('umur');
				$alamat = $this->input->post('alamat');
				$telp = $this->input->post('telp');
				
				$data = array(
					'namalengkap'=>$nama,
					'umur'=>$umur,
					'alamat'=>$alamat,
					'telp'=>$telp
				);

				$this->pasien->update_pasien($data, $id);
				$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil diubah.</div>');
				redirect('pasien');

			}else{
				$data['query'] = $this->pasien->ambil_pasien($id);

				$this->load->view('head');
	    		$this->load->view('pasien/pasien_edit', $data);
	    		$this->load->view('foot');
			}
		}
	}


	function hapus($id=null){
		if(!$id){
			echo 'Parameter Error';
		}else{
			$data = array('tampil'=>0);

			$this->pasien->update_pasien($data, $id);
			$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil hapus.</div>');
			redirect('pasien');
		}
	}

//end of class	
}