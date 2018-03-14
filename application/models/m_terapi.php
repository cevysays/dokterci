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
		$this->db->order_by('registrasi.id','DESC');

		$query = $this->db->get('registrasi', $num, $offset);

		return $query->result();
	}


	function simpan_data($table, $data){
		$this->db->insert($table, $data);
	}

	// function replace_data($table, $data){
	// 	$this->db->replace($table, $data);
	// }

	function amburadul_data($data){

    $this->db->where('no_reg', $data['no_reg']);
    $this->db->where('pasien_id', $data['pasien_id']);
    $this->db->where('diagnosa', $data['diagnosa']);
    $this->db->where('tanggal_periksa', $data['tanggal_periksa']);
    $res1 = $this->db->get('diagnosa')->row();

    if(empty($res1)){
    	$this->db->insert('diagnosa', $data);
    }


    // // if ($res1->row()->id==null)
    // // {
    	

    // 	print_r(empty($res1->row()->id) ? 'a' : 'b');
    // 	exit();

    	// $this->simpan_data('diagnosa',$data);
    // }

 //        return false;


	}



	// function update_by_tanggal($tanggal, $data, $table)
	// {    	
	// 	$this->db->where('tanggal_periksa', $tanggal);
	// 	$this->db->update($table, $data);

	// 	if($this->db->affected_rows() ==0){
	// 		  return 0; //add your code here
	// 		}else{
	// 		  return 1; //add your your code here
	// 		}
	// }


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
	$this->db->select(array(
		"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
		'diagnosa.*'
	), FALSE);
	$this->db->join('registrasi','registrasi.no_reg = diagnosa.no_reg');
	$this->db->order_by('diagnosa.id','DESC');
	$query = $this->db->get_where('diagnosa', array('diagnosa.pasien_id'=>$pasien));

	return $query->result();
}


function tampil_tindakan($noreg){
	$this->db->select('tindakan.*,master_tindakan.*');
	$this->db->join('master_tindakan','master_tindakan.tindakan_id = tindakan.tindakan');
	$this->db->order_by('id','DESC');
	$query = $this->db->get_where('tindakan',array('no_reg'=>$noreg));

	return $query->result();
}

function tampil_history_tindakan($pasien){
	$this->db->select(array(
		"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
		'tindakan.*'
	),FALSE);
	$this->db->join('registrasi','registrasi.no_reg = tindakan.no_reg');
	$this->db->order_by('tindakan.id','DESC');
	$query = $this->db->get_where('tindakan', array('tindakan.pasien_id'=>$pasien));

	return $query->result();
}


function tampil_terapi($noreg){
	$this->db->order_by('id','DESC');
	$query = $this->db->get_where('terapi', array('no_reg'=>$noreg));

	return $query->result();
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


function hapus_tindakan($id){
	$this->db->where('id', $id);
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

//end of class
}	