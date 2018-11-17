<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Artikel_Model');
		$this->load->model('Kategori_Model');
		$this->load->helper('text');
	}

	public function index(){
		//init library pagination
		$this->load->library('pagination');

		//get jumlah data keseluruhan
		$jumlah_data = $this->Artikel_Model->count_all();

		//set config
		$config['base_url'] = base_url().'index.php/home/index/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;

		/* This Application Must Be Used With BootStrap 3 *  */
		$config['full_tag_open'] 	= "<ul class='pagination'>";
		$config['full_tag_close'] 	= "</ul>";
		$config['num_tag_open'] 	= "<li>";
		$config['num_tag_close'] 	= "</li>";
		$config['cur_tag_open'] 	= "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] 	= "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] 	= "<li>";
		$config['next_tagl_close'] 	= "</li>";
		$config['prev_tag_open'] 	= "<li>";
		$config['prev_tagl_close'] 	= "</li>";
		$config['first_tag_open'] 	= "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] 	= "<li>";
		$config['last_tagl_close'] 	= "</li>";

		//init config pagination
		$this->pagination->initialize($config);

		//get offset
		$offset = $this->uri->segment(3);

		//get sliced select
		$data['artikel_data'] = $this->Artikel_Model->get_paginated_data($config['per_page'], $offset)->result_array();

		//get all artikel data
		// $data['artikel_data'] = $this->Artikel_Model->get_all()->result_array();

		//cara menampilkan view dan passing data
		$this->load->view('home/index', $data);
	}

	public function detail($id_artikel){
		//get artikel by id
		$data['artikel_data'] = $this->Artikel_Model->get_by_id($id_artikel)->row_array();

		$this->load->view('home/detail', $data);
	}

	public function latihan_jquery_bootstrap(){
		$this->load->view('home/latihan_jquery_bootstrap');
	}

}