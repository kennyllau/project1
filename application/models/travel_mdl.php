<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel_mdl extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->library("form_validation");
	}



	public function add($trip)
	{
		// var_dump($trip['origin']);
		// die();
			$query = "INSERT INTO trips (user_id, origin, destination, playlist_name, playlist_link, created_at)
					VALUES (?,?,?,?,?, NOW());";
		$values = (array($this->session->userdata('id'), $trip['origin'], $trip['destination'], $trip['playlist_name'], $trip['playlist_link']));

		return $this->db->query($query, $values);


	}


















}