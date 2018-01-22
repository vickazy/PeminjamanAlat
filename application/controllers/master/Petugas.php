<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login('Admin'); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('PetugasModel');
		$this->load->helper('url');
	}

	public function index(){
		$where = array('username' => $this->session->userdata('username'));
		$data  = array(
			'title' => 'Data Petugas | Halaman '.$this->session->userdata('jabatan'),
			'petugas'	=> $this->PetugasModel->read($where, 'username')->result()
		);

		$this->layouts->utama('master/Petugas/PetugasView', $data);
	}

	public function tambah(){
		$data = array(
			'title' => 'Tambah Petugas | Halaman '.$this->session->userdata('jabatan'),
			'kode'	=> $this->PetugasModel->auto()
		);

		if ($this->input->post('submit')) {
			$this->PetugasModel->tambah();
			redirect('master/Petugas');
		}

		$this->layouts->utama('master/Petugas/PetugasInsert', $data);
	}
	
}