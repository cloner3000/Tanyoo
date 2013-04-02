<?php
class Log_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}


	/* Fungsi: add_log_jawaban
	   parameter: $username, $id_soal

	   memasukkan user telah menjawab soal dengan benar
	*/
	public function add_log_jawaban($username, $id_soal){
		$query = $this->db->insert('log', array('username'=>$username,
											 'id_soal'=>$id_soal,
											 'log_type'=>1));
		return $query;
	}

	/* Fungsi: cek_log_jawaban
	   parameter: $username, $id_soal
	   output : BOOLEAN
	   mengecek apakah $username telah menjawab $id_soal.
	   Return TRUE kalau sudah
	*/
	public function cek_log_jawaban($username, $id_soal){
		$query = $this->db->get_where('log', array('username'=>$username,
												   'id_soal'=>$id_soal,
												   'log_type'=>1));

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	/* Fungsi: get_num_penjawab
	   parameter: $id_soal
	   output : INTEGER
	   
	   mendapatkan banyak penjawab soal terkait
	*/
	public function get_num_penjawab($id_soal){
		$query = $this->db->get_where('log', array('id_soal'=>$id_soal,
												   'log_type'=>1));
		return $query->num_rows();
	}

	/* Fungsi: get_num_flag
	   parameter: $id_soal
	   output : INTEGER
	   
	   mendapatkan banyak flag terkait
	*/
	public function get_num_flag($id_soal){
		$query = $this->db->get_where('log', array('id_soal'=>$id_soal,
												   'log_type'=>2));
		return $query->num_rows();
	}


	/* Fungsi: get_skor
	   parameter: $username
	   output : INTEGER
	   
	   mendapatkan skor dari username
	*/
	public function get_skor_from_username($username){
		$query = $this->db->get_where('log', array('username'=>$username,
												   'log_type'=>1));
		return $query->num_rows();
	}

	/* Fungsi: add_log_flag
	   parameter: $username, $id_soal

	   memasukkan flag dari user
	*/
	public function add_log_flag($username, $id_soal){
		$query = $this->db->insert('log', array('username'=>$username,
											   'id_soal' =>$id_soal,
											   'log_type'=>2));
		return $query;
	}

	/* Fungsi: remove_log_flag
	   parameter: $username, $id_soal

	   menghilangkan flag dari user
	*/
	public function remove_log_flag($username, $id_soal){
		$query = $this->db->delete('log', array('username'=>$username,
											   'id_soal' =>$id_soal,
											   'log_type' => 2));
		return $query;
	}

	/* Fungsi: get_num_flag
	   parameter: $id_soal

	   mendapatkan banyak flag soal tertentu
	*/
	public function get_flag_num($id_soal){
		$query = $this->db->get_where('log', array('id_soal' => $id_soal,
												   'log_type'=> 2));
		return $query->num_rows();
	}

	/* Fungsi: cek_log_flag
	   parameter: $username, $id_soal
	   output : BOOLEAN
	   mengecek apakah $username telah memberi flag $id_soal.
	   Return TRUE kalau sudah
	*/
	public function cek_log_flag($username, $id_soal){
		$query = $this->db->get_where('log', array('username'=>$username,
												   'id_soal'=>$id_soal,
												   'log_type'=>2));

		if ($query->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}