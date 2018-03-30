<?php 

class M_pasien extends CI_Model{

	function __construct(){
		parent::__construct();
	}


	function tampil_pasien($num, $offset){
		$this->db->select(array(
			'id',
			'namalengkap',
			'jenis_kelamin',
			'umur',
			'riwayat',
			'rm_upload',
			'alamat',
			'telp',
			"DATE_FORMAT(lastinput,'%d-%m-%Y') as tanggal"
			), FALSE);
		$this->db->where('tampil', 1);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('pasien',$num, $offset);

		return $query->result();
	}

	function search($keyword)
    {
        $this->db->or_like('id',$keyword);
        $this->db->or_like('namalengkap',$keyword);
        $this->db->or_like('alamat',$keyword);                         
        $this->db->or_like('umur',$keyword);
        $query =  $this->db->get('pasien');
        return $query->result();
    }

	function cetak_pasien(){

		$this->db->select('*');

		$query = $this->db->get('pasien');
		return $query->result();

	}


	function simpan_pasien($data){
		$this->db->insert('pasien', $data);
	}


	function ambil_pasien($id){
		$query = $this->db->get_where('pasien', array('id'=>$id));

		return $query->row();
	}


	function update_pasien($data, $id){
		$this->db->where('id', $id);
		$this->db->update('pasien', $data);
	}

//end of class	
}