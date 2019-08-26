<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Mj extends CI_Controller{
		public function __construct(){
			parent::__construct();
			// $usertype = $this->session->userdata("usertype");
			// if(!$usertype){
			// 	echo "NOT ALLOWED";
			// }else{
			// 	echo "ALLOWED";
			// }
		}
		
		public function index(){
			$this->load->view("files/login");
		}
		public function create(){
			$this->load->view("files/register");
		}
		public function login(){
			 $this->input->post('username');
			 $this->input->post('password');
			 $this->load->view('files/login');
		}
		public function insert(){
			$insert_Data = array(
				'name' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'pass' => $this->input->post('password'),
				'usertype' => $this->input->post('utype')
			);
			$this->load->model('mymodel');
			$this->mymodel->insertData($insert_Data);
			echo 'Data inserted';
		}
		public function loggingIn(){
			$username = $this->input->post('user');
			$password = $this->input->post('pass');
			$this->load->model('mymodel');
			$queryLogin = $this->mymodel->queryData($username,$password);
			if($queryLogin){
				$this->session->set_userdata(
					array(
						"usertype"=> $queryLogin->usertype,
						"name" => $queryLogin->name
					)
				);
				echo json_encode($queryLogin);
			}else{
				echo "error";
			}
		}

		public function animals(){
			$data = $this->session->userdata("usertype");
			$this->load->view("files/animals");
		}
		public function user(){
			$data = $this->session->userdata("usertype");
			$this->load->view("files/user");
		}
		public function showData(){
			$this->load->model('mymodel');
			$showme = $this->mymodel->Animals();
			echo json_encode($showme);
		}
		public function showEdit(){
			$id = $this->input->post('id');
			$this->load->model('mymodel');
			$fetch = $this->mymodel->fetchData($id);
			echo json_encode($fetch);
		}
		public function EditData(){
			$id = $this->input->post('id');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$this->load->model('mymodel');
			$edit = $this->mymodel->editdata($id,$name,$email,$pass);
		}
		public function deleteData(){
			$id = $this->input->post('id');
			$this->load->model('mymodel');
			$delete = $this->mymodel->delete($id);
		}

	}
?>