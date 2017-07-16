<?php
class M_laporan extends CI_Model{

	function __construct(){
		parent::__construct();
	}


	function tampil_pasien($dari, $sampai){
		$this->db->select(array(
			'registrasi.*',
			"DATE_FORMAT(registrasi.tgl_reg, '%d-%m-%Y') as tanggal",
			'pasien.*'
			),FALSE);
		$this->db->join('pasien','pasien.id = registrasi.pasien_id','LEFT');
		$this->db->where('registrasi.tgl_reg >=',$dari);
		$this->db->where('registrasi.tgl_reg <=',$sampai);
		$this->db->order_by('registrasi.tgl_reg','ASC');
		$query = $this->db->get('registrasi');

		return $query->result();
	}
//end of class
}	