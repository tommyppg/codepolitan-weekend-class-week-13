<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Artikel_Model');
		$this->load->model('Kategori_Model');

		// $this->session->userdata('logged_in') == FALSE
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
	}
	
	public function index(){
		// $data_session['name'] = "Tommy";
		// $this->session->set_userdata($data_session);
		// exit();

		//get all artikel data
		$data['artikel_data'] = $this->Artikel_Model->get_all()->result_array();

		//cara menampilkan view dan passing data
		$this->load->view('artikel/index', $data);
	}
	
	public function add(){
		//get all kategori data
		$data['kategori_data'] = $this->Kategori_Model->get_all()->result_array();

		$this->load->view('artikel/form', $data);
	}

	public function update($id_artikel){
		//get all kategori data
		$data['kategori_data'] = $this->Kategori_Model->get_all()->result_array();

		//ambil artikel by id, kemudian pakai row_array untuk fetch data nya
		$data['artikel_data'] = $this->Artikel_Model->get_by_id($id_artikel)->row_array();

		$this->load->view('artikel/form', $data);
	}

	public function process(){
		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required|min_length[5]');
		$this->form_validation->set_rules('isi_artikel', 'Isi Artikel', 'required');
		$this->form_validation->set_rules('author_artikel', 'Author Artikel', 'required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

		//proses pengecekan validasi
		if($this->form_validation->run() == FALSE){
			//kondisi jika validasi tidak lolos

			//get all kategori data
			$data['kategori_data'] = $this->Kategori_Model->get_all()->result_array();

            $this->load->view('artikel/form', $data);
		}else{
			//kondisi jika validasi lolos

			//set config
			$gambar_artikel = "";
			if($_FILES['gambar_artikel']['tmp_name'] != ''){
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['encrypt_name']        	= TRUE;
		 		
		 		//load library
				$this->load->library('upload', $config);
		 		
				if ($this->upload->do_upload('gambar_artikel')){
					//save to db
					$gambar_artikel = $this->upload->data('file_name');
				}else{
					print_r($this->upload->display_errors());exit();
				}
			}

			//get input form, key array tidak boleh asal, tp ikut ke field di table databasenya
			$id_artikel = $this->input->post('id_artikel');
			$data['judul_artikel'] = $this->input->post('judul_artikel');
			$data['isi_artikel'] = $this->input->post('isi_artikel');
			$data['author_artikel'] = $this->input->post('author_artikel');
			$data['id_kategori'] = $this->input->post('id_kategori');
			//set nama gambar artikel
			if(!empty($gambar_artikel)){
				$data['gambar_artikel'] = $gambar_artikel;
			}

			if(empty($id_artikel)){
				//panggil insert function dari model
				$result = $this->Artikel_Model->insert($data);
			}else{
				//panggil update function dari model
				$result = $this->Artikel_Model->update($id_artikel, $data);
			}
			

			if($result){
				//mengarahkan halaman ke fungsi yang diinginkan
				redirect('artikel');
			}else{
				echo "Gagal menyimpan data";
			}
		}
		
	}

	public function delete($id_artikel){
		$result = $this->Artikel_Model->delete($id_artikel);

		if($result){
			//mengarahkan halaman ke fungsi yang diinginkan
			redirect('artikel');
		}else{
			echo "Gagal menghapus data";
		}
	}

}