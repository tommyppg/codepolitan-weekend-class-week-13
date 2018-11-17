<?php

class User_Model extends CI_Model{
	//define nama tabel
	private $table = 'user';

	function cek_login($username, $password){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		return $this->db->get();
	}

	function get_all(){
		return $this->db->get($this->table);
	}

	function get_by_id($id_user){
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user', $id_user);

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

	function update($id_user, $data){
		$this->db->where('id_user', $id_user);
		$this->db->update($this->table, $data);
		
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function delete($id_user){
		$this->db->where('id_user', $id_user);
		$this->db->delete($this->table);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}