<?php

class Kategori_Model extends CI_Model{
	//define nama tabel
	private $table = 'kategori';
	
	function get_all(){
		return $this->db->get($this->table);
	}
}