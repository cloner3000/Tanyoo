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
			$this->db->where_not_in('locked', array(1));

			return $this->db->get('soal')->result(); //nama tabelnya soal
	}
	
	
	//mengambil soal-soal berdasarkan user tertentu
	function selectByUser($user){
		$this->db->order_by("id_soal", "desc"); 
		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);
		$this->db->where_not_in('locked', array(1));

		$data = $this->db->get_where('soal', array('username' => $user));
		return $data->result();
	}

	//mengambil soal-soal berdasarkan user tertentu menggunakan pagination
	function selectByUserPagination($user, $page, $limit){
		$this->db->order_by("id_soal", "desc"); 

		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);
		$this->db->where_not_in('locked', array(1));

		$data = $this->db->get_where('soal', array('username' => $user), $limit, $page-1);
		return $data->result();
	}

	//mengambil soal-soal berdasarkan user tertentu menggunakan pagination individu
	function selectByUserPagination_1($user, $page, $limit){
		$this->db->order_by("id_soal", "desc"); 

		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);

		$data = $this->db->get_where('soal', array('username' => $user), $limit, $page-1);
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
			$this->db->where_not_in('locked', array(2));
			$data = $this->db->get_where('soal', array('id_soal' => $id_soal));

			return $data;
	}	

	function get_random_soal(){
		$query = 'SELECT * FROM `soal` WHERE locked=0 and (NOT locked=3 or NOT locked=1) ORDER BY RAND() LIMIT 0,1';
		$data = $this->db->query($query);

		return $data->row();
	}
	
	function simpan_ubah($id_soal, $data){
		$this->db->where("id_soal",$id_soal);
		$this->db->update("soal",$data);
	}
	
	function proses_cari_soal($cari){
		$this->db->like('tag', $cari, 'both'); 
		$this->db->limit(5); //batas soal yg muncul 
		$this->db->order_by('tag', 'random'); //soal dirandom
		$data = $this->db->get('soal');
		return $data->result();
	}
	
	function jawab_soal_id($id_soal){
		$data = $this->db->get_where('soal', array('id_soal' => $id_soal));
		return $data->row();
	}

	// "menghapus" soal
	function delete_soal($id_soal){
		$this->db->where("id_soal", $id_soal);
		$data = $this->db->update("soal", array('locked'=>3));

		return $data;
	}

	function is_soal_deleted($id_soal){
		$data = $this->db->get_where('soal', array('locked'  => 3,
												   'id_soal' => $id_soal));
		$num = $data->num_rows();

		if ($num == 0) {
			return false;
		}else{
			return true;
		}
	}

	//dapat jumlah semua soal
	function get_num_total_soal(){
		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);
		$this->db->where_not_in('locked', array(1));
		$query = $this->db->get('soal');
		return $query->num_rows();
	}


	//DEPRECATED JANGAN DIPAKAI KARENA nggak mempertimbangkan soal dihapus
	function get_jumlah_soal($user){
		$this->db->select('text_soal');
		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);
		$this->db->where_not_in('locked', array(1));
		$data = $this->db->get_where('soal', array('username' => $user));
		$data = $data->num_rows();
		return $data;
	}
	//untuk mendapatkan jumlah soal sebuah user
	public function get_jumlah_soal_1($user){
		$this->db->select('text_soal');
		
		$deleted = array(3);
		$this->db->where_not_in('locked', $deleted);

		$data = $this->db->get_where('soal', array('username' => $user));
		$data = $data->num_rows();
		return $data;
	}
	//mendapatkan banyak orang yang sudah menjawab soal
	function get_jumlah_penjawab($user){

		$query = "SELECT * FROM log, soal WHERE log.id_soal = soal.id_soal AND soal.username=?";
		$temp = $this->db->query($query,array($user));

		return $temp->num_rows();
	}

}