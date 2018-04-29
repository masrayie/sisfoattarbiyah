<?php

class ModelDB extends CI_Model{

	function insertGuru($object){
		$data = array(
			'nip' 			=> $object->getNip(),
			'nama_guru' 	=> $object->getNamaGuru(),
			'kode_guru'		=> $object->getKodeGuru(),
			'alamat' 		=> $object->getAlamat(),
			'email'			=> $object->getEmail(),
			'password' 		=> $object->getPassword()
		);
		$this-> db -> insert('t_guru', $data);
		return $this-> db -> affected_rows();
	}

	function insertMapel($object){
		$data = array(
			'kode_mapel' 			=> $object->getKodeMapel(),
			'nama_mapel' 	=> $object->getNamaMapel()
		);
		$this-> db -> insert('t_mapel', $data);
		return $this-> db -> affected_rows();
	}

	function insertData($data, $table){
		$this -> db -> insert($table, $data);
	}

	function readDataAll($table){
		$this-> db -> select('*');
		$this-> db -> from($table);
		$query = $this -> db -> get();

	    if($query -> num_rows() > -1)
	    {
	      return $query->result();
	    }
	    else
	    {
	      return false;
	    }
	}

	function readDataWhere($column, $value, $table){
		$this-> db -> select('*');
		$this-> db -> from($table);
		$this-> db -> where($column, $value);
		$query = $this -> db -> get();

	    if($query -> num_rows() == 1)
	    {
	      return $query->result();
	    }
	    else
	    {
	      return false;
	    }
	}

	function editData($column, $id, $table, $data){
		$this->db->where($column, $id);
    	$this->db->update($table, $data);
	}

	function deleteData($column, $id, $table){
		$this->db->where($column, $id);
      	$this->db->delete($table);
	}

	function freeQuery($query){
		$sql = $query;
      	$this-> db -> query($sql);
	}
}

?>
