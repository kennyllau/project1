<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Los_Angeles');

class Register_mdl extends CI_Model {
	
	function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
	}

	function add_user($user){

		$this->form_validation->set_rules("first_name", "first_name", "trim|required|min_length[3]");

		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('first_name', "first name must be at least 3 characters");
			redirect('/main/register');
		}

		$this->form_validation->set_rules("last_name", "last_name", "trim|required|min_length[3]");

		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('last_name', "last name must be at least 3 characters");
			redirect('/main/register');
		}

		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[users.email]");

		if($this->form_validation->run()===FALSE){
			$this->session->set_flashdata('bademail', "Email has been taken.");
			redirect('/main/register');
		}


		// $this->form_validation->set_rules("password", "password", "trim|required|min_length[8]|matches[conpassword]");	
		// if($this->form_validation->run()===FALSE){
		// 	$this->session->set_flashdata('badpassword', "Must be 8 characters long and matching.");
		// 	redirect('/');
		// }

		else {


		$query = "INSERT INTO users(first_name, last_name, email, password, created_at) VALUES (?,?,?,?,?)";

		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], date("Y-m-d, H:i:s"));

		return $this->db->query($query, $values);
		}
	}


	function get_all_users(){
		return $this->db->query("SELECT * FROM users")->result_array();
	}


	

	function get_user_by_email($email){
		return $this->db->query("SELECT * FROM users where email=?", array($email))->row_array();
	}


}