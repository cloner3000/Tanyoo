<?php
class Soal_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	
	function selectAll(){
			$this->db->order_by("id_soal", "desc"); 

			//pilih yang bukan telah pura-puranya terhapus
			//locked = 3 artinya terhapus
			$deleted = array(3);
			$this->db->where_not_in('locked', $deleted);

			return $this->db->get('soal')->result(); //nama tabelnya soal
	}
	
	
	//mengambil soal-soal berdasarkan user tertentu
	function selectByUser($user){
		$this->db->order_by("id_soal", "desc"); 
		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);

		$data = $this->db->get_where('soal', array('username' => $user));
		return $data->result();
	}

	//menambah soal baru
	public function add_soal($data){
		$this->db->insert('soal', $data); //insert ke tabel soal
	}

	//mengedit soal
	public function edit_soal(){
		
	}
	
	function selectsoal ($id_soal){
			$deleted = array(3);
			$this->db->where_not_in('locked', $deleted);
			$data = $this->db->get_where('soal', array('id_soal' => $id_soal));

			return $data;
	}	

	function get_random_soal(){
		$query = 'SELECT * FROM `soal` WHERE locked=0 and NOT locked=3 ORDER BY RAND() LIMIT 0,1';
		$data = $this->db->query($query);

		return $data->row();
	}
	
	function simpan_ubah($id_soal, $data){
		//$this->db->where("id_soal",$_POST['id_soal']);
		//$this->db->update("soal",$_POST);
		$this->db->where("id_soal",$id_soal);
		$this->db->update("soal",$data);
		//redirect('','refresh');
	}
	
	function proses_cari_soal($cari){
		$this->db->like('tag', $cari, 'both'); //%like%
		$data = $this->db->get('soal');
		//$data = $this->db->get_where('soal', array('tag' => $cari));
		return $data->result();
	}
	
	function jawab_soal_id($id_soal){
		$data = $this->db->get_where('soal', array('id_soal' => $id_soal));
		return $data->row();
	}

	function delete_soal($id_soal){
		$this->db->where("id_soal", $id_soal);
		$data = $this->db->update("soal", array('locked'=>3));

		return $data;
	}

	//dapat jumlah semua soal
	function get_num_total_soal(){
		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);
		$query = $this->db->get('soal');
		return $query->num_rows();
	}

	public function get_jumlah_soal($user){
		$this->db->select('text_soal');
		$data = $this->db->get_where('soal', array('username' => $user));
		$data = $data->num_rows();
		return $data;
	}

}