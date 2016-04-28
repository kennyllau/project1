<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registers extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Register_mdl");
		$this->load->model("Login_mdl");
		$this->load->library("form_validation");
	}

	public function add(){

		if($this->input->post('first_name') == null){
			$this->session->set_flashdata('first_name', 'first name cannot be empty');
			redirect('/main/register');
		}

		if($this->input->post('last_name') == null){
			$this->session->set_flashdata('last_name', ' last name cannot be empty');
			redirect('/main/register');
		}

		if($this->input->post('email') == null){
			$this->session->set_flashdata('email', 'email cannot be empty');
			redirect('/main/register');
		}

		if($this->input->post('password') == null){
			$this->session->set_flashdata('password', 'password cannot be empty');
			redirect('/main/register');
		}

		$this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|matches[conpassword]");	
		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('badpassword', "Password must be 8 characters long and matching.");
			redirect('/main/register');
		}


		$info = $this->input->post();

		
		$enc_password=md5($this->input->post('password'));
		$data = array(
			"first_name" => $info['first_name'],
			"last_name" => $info['last_name'],
			"email" => $info['email'],
			"password" => $enc_password,
			);



		$user_added = $this->Register_mdl->add_user($data);


		if($user_added){

			$user = $this->Login_mdl->get_user_by_username($info['email']);
			// variable user stores the person that just registered
			// var_dump($user);
			// die();
			$usersession = array(
				'id'=>$user['id'],
				'first_name' => $user['first_name'],
				'last_name' => $user['last_name'],
				'email' => $user['email']
				);
			$this->session->set_userdata('id', $usersession['id']);
			$this->session->set_userdata('first_name', $usersession['first_name']);
			$this->session->set_userdata('last_name', $usersession['last_name']);
			$this->session->set_userdata('email', $usersession['email']);
			redirect('/main/trip');
		}	
	}




}