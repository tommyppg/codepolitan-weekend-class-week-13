<?php

class Role_Model extends CI_Model{
	//define nama tabel
	private $table = 'role';
	
	function get_all(){
		return $this->db->get($this->table);
	}
}