<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
	}
	
	public function index()
	{
		$this->load->view('master/Alat/AlatView');
	}
	
}