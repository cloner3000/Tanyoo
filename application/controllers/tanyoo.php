<?php
	//di comment ajah
	
	//ini untuk controller dari tanyoo
	//ngedit buat yola nambah
	class Tanyoo extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}
		
		//comment lagi
		public function index(){ //index disini
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('session');
			
			//supaya kalau login langsung redirect
			if ($this->session->userdata('LOGGED_IN')) {
				redirect('home');
			}else{
				$data['title'] = "Login to Tanyoo";
				$this->load->view('templates/header', $data);
				$this->load->view('login', $data);
				$this->load->view('templates/footer', $data);	
			}
			

		}
		
		public function register(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('register', $data);
			
		}

		public function tanya(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');

			$data['title'] = "Daftar";

			$this->load->view('templates/header', $data);
			$this->load->view('templates/header_bar', $data);
			$this->load->view('tanya', $data);
			$this->load->view('templates/footer_logout', $data);
		}

		public function home(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->library('session');

			$data['title'] = "Home";

			if ($this->session->userdata('LOGGED_IN')) {
				$this->load->view('templates/header', $data);
				$this->load->view('templates/header_bar', $data);
				$this->load->view('home.php', $data);
				$this->load->view('templates/footer_logout', $data);
			}else{
				redirect('index');
			}
			
		}

	}