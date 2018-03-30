<?php

class master_tindakan extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('isLogin') == FALSE) {redirect('auth/login');}
		$this->load->model('m_mastertindakan','master_tindakan');

	}

    function get_items(){
        
        return $this->master_tindakan->get_items();
    }


	function index($id=null){

		$get = $this->db->get('master_tindakan');

		$config['base_url'] = site_url().'/tindakan/index';

		$config['total_rows'] = $get->num_rows();
		$config['per_page'] = 10;
		$config['next_page'] = '&raquo;';
		$config['prev_page'] = '&laquo;';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';

		$this->pagination->initialize($config);

		$data['query'] = $this->master_tindakan->tampil_mastertindakan($config['per_page'],$id );

		$this->uri->segment(3);

		$data['halaman'] = $this->pagination->create_links();
		  
        //   echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        $this->load->view('head');
		$this->load->view('master/tindakan/index', $data);
		$this->load->view('foot');
	}

	function tambah_tindakan(){
		if(isset($_POST['submit'])){
            $data = array(
            	'kode_tindakan' => $this->input->post('kode_tindakan'),
                'nama_tindakan' => $this->input->post('nama_tindakan'),
            	'biaya' => $this->input->post('biaya'),
            	);

            $this->master_tindakan->simpan($data);
            $this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil disimpan.</div>');
            redirect('master_tindakan');

        }else{
        	$this->load->view('head');
        	$this->load->view('master/tindakan/tambah_tindakan');
        	$this->load->view('foot');
        }
    }

    function ubah($id=null){
    	if(!$id){
    		echo 'Parameter Error. Hubungi Administrator Program.';
    	}else{
    		if(isset($_POST['submit'])){
    			
    			$data = array(
                    'kode_tindakan' => $this->input->post('kode_tindakan'),
                    'nama_tindakan' => $this->input->post('nama_tindakan'),
                    'biaya' => $this->input->post('biaya'),
    			);

    			$this->master_tindakan->update_mastertindakan($data, $id);
    			$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil diubah.</div>');
    			redirect('master_tindakan');

    		}else{
    			$data['query'] = $this->master_tindakan->ambil_mastertindakan($id);

    			$this->load->view('head');
    			$this->load->view('master/tindakan/tindakan_edit', $data);
    			$this->load->view('foot');
    		}
    	}
    }

    function hapus($id=null){
    	if(!$id){
    		echo 'Parameter Error';
    	}else{

    		$this->master_tindakan->hapus_mastertindakan($id);
    		$this->session->set_flashdata('pesan', '<div id="pesan" class="alert alert-success"><b>Sukses! </b> Data berhasil hapus.</div>');
    		redirect('master_tindakan');
    	}
    }

    function cetak(){
		$data['cetak'] = $this->master_tindakan->cetak_mastertindakan();

		$this->load->view('master/tindakan/tindakan_cetak', $data);

	}

//end of class	
}