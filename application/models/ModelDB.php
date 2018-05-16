<?php

class ModelDB extends CI_Model{

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

	    if($query -> num_rows() > -1)
	    {
	      return $query->result();
	    }
	    else
	    {
	      return $this->db->_error_message();
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
    return $this->db->query($query)->result();
	}

}

?>
