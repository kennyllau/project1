<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travels extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("Travel_mdl");
		$this->load->library("form_validation");
	}



	public function add_destination(){

		$trip = $this->input->post();

		// var_dump($trip);
		// die();
		$this->Travel_mdl->add($trip);

		// $this->load->view('welcome_page');




	}












}