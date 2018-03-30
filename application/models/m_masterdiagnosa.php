<?php
class M_masterdiagnosa extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	function json() {
        $this->datatables->select('diagnosa_id,kode_icd,nama_penyakit');
        $this->datatables->from('master_diagnosa');
        $this->datatables->add_column('view', '<a href="world/edit/$1">edit</a> | <a href="world/delete/$1">delete</a>', 'ID');
        return $this->datatables->generate();
    }

	function simpan($data){
		$this->db->insert('master_diagnosa', $data);
	}

	function tampil_masterdiagnosa($num='', $offset=''){
		$this->db->select(array(
			'diagnosa_id',
			'kode_icd',
			'nama_penyakit',
			), FALSE);
		
		$this->db->order_by('kode_icd', 'DESC');
		if ($num!='' && $offset!='') {
			$query = $this->db->get('master_diagnosa',$num, $offset);
		} else{
			$query = $this->db->get('master_diagnosa');
		}
		

		return $query->result();
	}

	function update_masterdiagnosa($data, $diagnosa_id){
		$this->db->where('diagnosa_id', $diagnosa_id);
		$this->db->update('master_diagnosa', $data);
	}

	function ambil_masterdiagnosa($diagnosa_id){
		$query = $this->db->get_where('master_diagnosa', array('diagnosa_id'=>$diagnosa_id));

		return $query->row();
	}

	function hapus_masterdiagnosa($diagnosa_id){
		$this->db->where('diagnosa_id', $diagnosa_id);
		$this->db->delete('master_diagnosa');
	}

	function cetak_masterdiagnosa(){

		$this->db->select('*');

		$query = $this->db->get('master_diagnosa');
		return $query->result();

	}

	function cari_diagnosa($keyword = '')
	{
		$this->db->select(array(
			'diagnosa_id',
			'kode_icd',
			'nama_penyakit',
			), FALSE);
		
		$this->db->like('kode_icd', $keyword);
		$this->db->or_like('nama_penyakit', $keyword);
		$this->db->order_by('kode_icd', 'DESC');
		$query = $this->db->get('master_diagnosa');
		return $query->result();
	}

}