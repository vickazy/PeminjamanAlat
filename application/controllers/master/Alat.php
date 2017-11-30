<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
	}
	
	public function index(){
		$data = array(
			'title' => 'Data Alat');

		$this->layouts->utama('master/Alat/AlatView', $data);
	}
	
}