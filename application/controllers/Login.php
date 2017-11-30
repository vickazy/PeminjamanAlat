<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->model('m_login');
	}

	public function index() {
		$session  	= $this->session->userdata('username');
		if($session == '') {
			$this->load->view('v_login');
		} else {
			redirect(base_url());
		}
	}

	function aksi_login() {
		// Fungsi Login
		$valid = $this->form_validation;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$valid->set_rules('username','Username','required');
		$valid->set_rules('password','Password','required');
		
		if($valid->run()) {
			$this->simple_login->login($username,$password, base_url(''), base_url('login'));
		}
	}
 
	function logout() {
		//$this->session->sess_destroy();
		//redirect(base_url('login'));

		$this->simple_login->logout();	
	}

}