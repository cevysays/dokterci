<?php 

class M_terapi extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function ambil_data_pasien($pasien,$noreg=null){
		$this->db->select(array(
			'registrasi.no_reg',
			'registrasi.keluhan',
			'pasien.*'));
		$this->db->join('pasien','pasien.id = registrasi.pasien_id','LEFT');
		$this->db->where('registrasi.pasien_id',$pasien);
		
		if(!is_null($noreg)){
			$this->db->where('registrasi.no_reg',$noreg);
		}
		$query = $this->db->get('registrasi');

		return $query->row();
	}

	function jupuk_pasien(){
		$this->db->query('select a.id, a.namalengkap, a.umur, a.alamat, a.telp, b.no_reg 
			from pasien a inner join registrasi b 
			on a.id=b.pasien_id where b.no_reg=REG000002');
	}

	function tampil_history($num, $offset){
		$this->db->select(array(
			'registrasi.no_reg',
			'registrasi.keluhan',
			"DATE_FORMAT(tgl_reg,'%d-%m-%Y') as tanggal",
			'pasien.*'));
		$this->db->join('pasien','pasien.id = registrasi.pasien_id','LEFT');
		$this->db->where('tampil',1);
		$this->db->order_by('registrasi.id','DESC');

		$query = $this->db->get('registrasi', $num, $offset);

		return $query->result();
	}


	function simpan_data($table, $data){
		$this->db->insert($table, $data);
	}

	function amburadul_data($table,$data){

    $this->db->where($data);
    $res1 = $this->db->get($table)->row();

    if(empty($res1)){
    	$this->db->insert($table, $data);
	    }
	}


function tampil_history_keluhan($pasien){
	$this->db->select(array(
		"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
		'registrasi.keluhan'
	), FALSE);
	$this->db->order_by('registrasi.id','DESC');
	$query = $this->db->get_where('registrasi', array('registrasi.pasien_id'=>$pasien));

	return $query->result();
}


function tampil_diagnosa($noreg){
	$this->db->select('diagnosa.*,master_diagnosa.*');
	$this->db->join('master_diagnosa','master_diagnosa.diagnosa_id = diagnosa.diagnosa');
	$query = $this->db->get_where('diagnosa', array('no_reg'=>$noreg));

	return $query->result();
}


function tampil_history_diagnosa($pasien){
	// print_r($pasien);
	// exit();
	$this->db->select(array(
		"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
		'diagnosa.*,master_diagnosa.nama_penyakit'
	), FALSE);
	$this->db->join('registrasi','registrasi.no_reg = diagnosa.no_reg');
	$this->db->join('master_diagnosa','master_diagnosa.diagnosa_id = diagnosa.diagnosa');
	$query = $this->db->get_where('diagnosa', array('diagnosa.pasien_id'=>$pasien));

	return $query->result();
}


function tampil_tindakan($noreg){
	$this->db->select('tindakan.*,master_tindakan.*');
	$this->db->join('master_tindakan','master_tindakan.tindakan_id = tindakan.tindakan');
	$query = $this->db->get_where('tindakan',array('no_reg'=>$noreg));

	return $query->result();
}


function tampil_history_tindakan($pasien){
	$this->db->select(array(
		"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
		'tindakan.*, master_tindakan.nama_tindakan'
	),FALSE);
	$this->db->join('registrasi','registrasi.no_reg = tindakan.no_reg');
	$this->db->join('master_tindakan','master_tindakan.tindakan_id = tindakan.tindakan');
	$query = $this->db->get_where('tindakan', array('tindakan.pasien_id'=>$pasien));

	return $query->result();
}


function tampil_terapi($noreg){
	$this->db->order_by('id','DESC');
	$query = $this->db->get_where('terapi', array('no_reg'=>$noreg));
	return $query->result();
}

function dokter($noreg){
$query = $this->db->query("SELECT id_user,namalengkap FROM `diperiksa_oleh` join users on diperiksa_oleh.id_user = users.id WHERE no_reg =".$noreg." and tanggal_periksa = '".date('Y-m-d')."'
");
// var_dump($noreg);die;
 return $query->row();
}


function tampil_history_terapi($pasien){
	$this->db->select(array(
		"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
		'terapi.*'
	),FALSE);
	$this->db->join('registrasi','registrasi.no_reg = terapi.no_reg');
	$this->db->order_by('terapi.id','DESC');
	$query = $this->db->get_where('terapi', array('terapi.no_rm'=>$pasien));

	return $query->result();
}


function hapus_diagnosa($noreg, $pasien_id, $diagnosa, $tanggal_periksa){
	$this->db->where('no_reg', $noreg);
	$this->db->where('pasien_id', $pasien_id);
	$this->db->where('diagnosa', $diagnosa);
	$this->db->where('tanggal_periksa', $tanggal_periksa);
	$this->db->delete('diagnosa');
}


function hapus_tindakan($noreg, $pasien_id, $tindakan, $tanggal_periksa){
	$this->db->where('no_reg', $noreg);
	$this->db->where('pasien_id', $pasien_id);
	$this->db->where('tindakan', $tindakan);
	$this->db->where('tanggal_periksa', $tanggal_periksa);
	$this->db->delete('tindakan');
}

function hapus_terapi($id){
	$this->db->where('id', $id);
	$this->db->delete('terapi');
}


function selesai_periksa($data, $noreg){
	$this->db->where('no_reg', $noreg);
	$this->db->update('registrasi', $data);
}

function simpan_resep($data){
		$this->db->insert('terapi', $data);
}

function tampil_resep($noreg,$idpasien){
	 $query = $this->db->order_by('id', 'DESC')->limit('1')->get_where('terapi', array(
	 	'no_reg' => $noreg,
	 	'no_rm'=>$idpasien,
	 	'tgl'=>date('Y-m-d'),
	 ));
return $query->row();
}

//end of class
}	