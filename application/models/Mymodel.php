<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Mymodel extends CI_Model{

		function insertData($data){
			$this->db->insert('users',$data);
		}

		function queryData($user,$pass){
			$this->db->where('name',$user);
			$this->db->where('pass',$pass);
			$result = $this->db->get('users');
			if($result->num_rows()>0){
				return $result->row();
			}else{
				return false;
			}
		}
		function Animals(){
			$utype = $this->session->userdata("usertype");
			$this->db->where('usertype',$utype);
			$result = $this->db->get('users');
				return $result->result();
		}
		function fetchData($data){
			$this->db->where('id',$data);
			$result = $this->db->get('users');
				return $result->result();
		}
		function editdata($id,$name,$email,$pass){
			$data = array(
				'name' => $name,
				'email' => $email,
				'pass' => $pass
			);
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('users');
			return 1;
		}
		function delete($data){
			$this->db->delete('users', array('id' => $data));
			return 1;
		}
	}
	
?>