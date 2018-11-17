<?php

class Artikel_Model extends CI_Model{
	//define nama tabel
	private $table = 'artikel';

	function count_all(){
		return $this->db->get($this->table)->num_rows();
	}

	function get_paginated_data($number, $offset){
		return $query = $this->db->get($this->table, $number, $offset);		
	}

	function get_all(){
		return $this->db->get($this->table);
	}

	function get_by_id($id_artikel){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_artikel', $id_artikel);

		return $this->db->get();
	}

	function insert($data){
		$this->db->insert($this->table, $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function update($id_artikel, $data){
		$this->db->where('id_artikel', $id_artikel);
		$this->db->update($this->table, $data);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function delete($id_artikel){
		$this->db->where('id_artikel', $id_artikel);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}