<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helloworld extends CI_Controller {

	public function index(){
		//membuat variabel yang akan dilempar ke view
		$data['nama_1'] = "Tommy";
		$data['nama_2'] = "Handoko";
		
		//variabel array
		$data['kumpulan_nama'] = array("Tommy", "Handoko", "Eko");
		
		//cara menampilkan view dan passing data
		$this->load->view('hello_world', $data);
	}

	public function hello_saya(){
		echo "<h1>Hello saya!</h1>";
	}
}