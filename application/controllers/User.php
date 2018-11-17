<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('User_Model');

		// $this->session->userdata('logged_in') == FALSE
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
	}

	public function index(){
		// echo $this->session->userdata('name');
		// exit();

		//get all artikel data
		$data['user_data'] = $this->User_Model->get_all()->result_array();

		//cara menampilkan view dan passing data
		$this->load->view('user/index', $data);
	}

	public function add(){
		$this->load->view('user/form');
	}

	public function update($id_user){
		//ambil artikel by id, kemudian pakai row_array untuk fetch data nya
		$data['user_data'] = $this->User_Model->get_by_id($id_user)->row_array();

		$this->load->view('user/form', $data);
	}

	public function process(){
		$this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
		$this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');

		//proses pengecekan validasi
		if($this->form_validation->run() == FALSE){
			$this->load->view('user/form');
		}else{
			//get input form, key array tidak boleh asal, tp ikut ke field di table databasenya
			$id_user = $this->input->post('id_user');
			$data['nama_depan'] = $this->input->post('nama_depan');
			$data['nama_belakang'] = $this->input->post('nama_belakang');
			$data['username'] = $this->input->post('username');

			if(empty($id_user)){
				//panggil insert function dari model
				$result = $this->User_Model->insert($data);
			}else{
				//panggil update function dari model
				$result = $this->User_Model->update($id_user, $data);
			}
			

			if($result){
				//mengarahkan halaman ke fungsi yang diinginkan
				redirect('user');
			}else{
				echo "Gagal menyimpan data";
			}
		}
	}

	public function delete($id_user){
		$result = $this->User_Model->delete($id_user);

		if($result){
			//mengarahkan halaman ke fungsi yang diinginkan
			redirect('user');
		}else{
			echo "Gagal menghapus data";
		}
	}

}