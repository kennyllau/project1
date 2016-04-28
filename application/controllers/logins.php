<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logins extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Login_mdl');
	}

	
	public function check(){

		if($this->input->post('email1')  == null){
			$this->session->set_flashdata('empty', 'email cannot be empty.');
			redirect('/');
		}

		if($this->input->post('password1')  == null){
			$this->session->set_flashdata('empty', 'password cannot be empty.');
			redirect('/');
		}

		$name = $this->input->post('email1');


		$exists = $this->Login_mdl->get_user_by_username($this->input->post('email1'));

		if($exists){
			$userpassword = $this->input->post('password1');
			if($exists['password']==md5($userpassword)){
				$usersession = array(
									'id'=>$exists['id'],
									'first_name' => $exists['first_name'],
									'last_name' => $exists['last_name'],
									'email' => $exists['email']
									);

				$this->session->set_userdata('id', $usersession['id']);
				$this->session->set_userdata('first_name', $usersession['first_name']);
				$this->session->set_userdata('last_name', $usersession['last_name']);
				$this->session->set_userdata('email', $usersession['email']);
				redirect('/main/trip');
			}
			
		}
		else {
			$this->session->set_flashdata('loginfail', "The email and password you entered don't match!");
			redirect('/main/index');
		}

	}

	


}