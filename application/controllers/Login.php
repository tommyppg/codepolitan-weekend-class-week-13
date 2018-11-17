<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}
	
	public function index(){
		$this->load->view('login/index');
	}

	public function process(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('login/index');
		}else{

			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			//cek to db
			$cek_login = $this->User_model->cek_login($username, $password);

			if($cek_login->num_rows() > 0){
				//kalau datanya ada

				//data user
				$data_user = $cek_login->row_array();

				//data session
				$data_session = array(
					'id_user' => $data_user['id_user'],
					'username' => $data_user['username'],
					'id_role' => $data_user['id_role'],
					'logged_in' => TRUE
				);

				//set session
				$this->session->set_userdata($data_session);

				//redirect
				redirect('artikel');
			}else{
				//kalau datanya ga ada
				$this->session->set_flashdata('message', 'Maaf username atau password sampeyan salah!!!');

				$this->load->view('login/index');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();

		redirect('login');
	}
}