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
		// $config['per_page'] = 10;
		// $config['next_page'] = '&raquo;';
		// $config['prev_page'] = '&laquo;';
		// $config['first_page'] = 'Awal';
		// $config['last_page'] = 'Akhir';

		$this->pagination->initialize($config);

        $data['query'] = $this->pasien->tampil_pasien($config['total_rows'],$id );
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
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$alamat = $this->input->post('alamat');
			$telp = $this->input->post('telp');
			//$riwayat = $this->input->post('riwayat');
			$tgl = date('Y-m-d H:i:s');

			//disini upload file
            $this->load->library('upload'); //panggil libary upload

            $extension = pathinfo($_FILES['rm_upload']['name'], PATHINFO_EXTENSION);

            $namafile                = "file" .'_'.time().'.'.$extension; //nama file + fungsi time
            $config['upload_path']   = FCPATH.'assets/img/pasien/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name']     = $namafile; //nama yang terupload nantinya

            $this->upload->initialize($config); //initialisasi upload dari array config
            $file_image_poto = $this->upload->data();

            $this->upload->do_upload('rm_upload');

            $data = array(
            	'namalengkap'=>$nama,
            	'umur'=>$umur,
                'jenis_kelamin'=>$jenis_kelamin,
            	'alamat'=>$alamat,
            	'telp'=>$telp,
            	'lastinput'=>$tgl,
            	'rm_upload'=>$file_image_poto['file_name'],
            	'riwayat'=>$this->input->post('riwayat')
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
                $jenis_kelamin = $this->input->post('jenis_kelamin');
    			$alamat = $this->input->post('alamat');
    			$telp = $this->input->post('telp');
    			//$riwayat = $this->input->post('riwayat');

                //disini upload file
            $this->load->library('upload'); //panggil libary upload

            $extension = pathinfo($_FILES['rm_upload']['name'], PATHINFO_EXTENSION);

            $namafile                = "file" .'_'.time().'.'.$extension; //nama file + fungsi time
            $config['upload_path']   = FCPATH.'assets/img/pasien/'; //Folder untuk menyimpan hasil upload
            $config['allowed_types'] = 'jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['file_name']     = $namafile; //nama yang terupload nantinya

            $this->upload->initialize($config); //initialisasi upload dari array config
            $file_image_poto = $this->upload->data();

            $this->upload->do_upload('rm_upload');

    			$data = array(
    				'namalengkap'=>$nama,
                    'umur'=>$umur,
    				'jenis_kelamin'=>$jenis_kelamin,
    				'alamat'=>$alamat,
    				'telp'=>$telp,
    				'riwayat'=>$this->input->post('riwayat'),
                    'rm_upload'=>$file_image_poto['file_name']
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