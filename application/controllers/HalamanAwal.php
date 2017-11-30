<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanAwal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
	}
	
	public function index(){
		$data = array(
			'title' => 'Halaman '. $this->session->userdata("jabatan"));

		$this->layouts->utama('dashboard', $data);
	}
	
}