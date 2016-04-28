<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('sc_mdl');
	}

	public function index(){
		$this->load->view('login_page');
	}

	public function trip(){
		//need to get info for user's trip history
		$this->load->view('welcome_page');
		
	}

	public function destroy(){
		$this->session->set_flashdata('destroy', "You have been logged off.");
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('first_name');
		$this->session->unset_userdata('last_name');
		$this->session->unset_userdata('email');
		$this->session->sess_destroy();
		redirect('/');
	}

	public function register(){
		$this->load->view('register_page');
	}
}
