<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('AlatModel');
			$this->load->helper('url');
	}
	
	public function index(){
		$data = array(
			'title' => 'Data Alat | Halaman '.$this->session->userdata('jabatan'),
			'alat'	=> $this->AlatModel->read()->result()
		);

		$this->layouts->utama('master/Alat/AlatView', $data);
	}

	public function tambah(){
		$data = array(
			'title' => 'Tambah Alat | Halaman '.$this->session->userdata('jabatan'),
			'kode'	=> $this->AlatModel->auto()
		);

		if ($this->input->post('submit')) {
			$this->AlatModel->tambah();
			redirect('master/Alat');
		}

		$this->layouts->utama('master/Alat/AlatInsert', $data);
	}

	public function edit($id_alat){
		$where = array('id_alat' => $id_alat);
		$data = array(
			'alat' 	=> $this->AlatModel->edit($where, 'alat')->result(),
			'title'	=> 'Ubah Data Alat | Halaman '.$this->session->userdata('jabatan')
		);

		$this->layouts->utama('master/Alat/AlatEdit', $data);
	}

	public function update(){
		$id_alat 	= $this->input->post('id_alat');
		$nama_alat 	= $this->input->post('nama_alat');
		$stok		= $this->input->post('stok');

		$data = array(
			'nama_alat' => $nama_alat,
			'stok'		=> $stok
		);

		$where = array('id_alat' => $id_alat);

		$this->AlatModel->update($where,$data,'alat');
		redirect('master/Alat');
	}
	
	public function hapus($id_alat){
		$where = array('id_alat' => $id_alat);
		
		if ($this->AlatModel->hapus($where,'alat')) {
			$response['status']  = 'error';
			$response['message'] = 'Data Gagal di Hapus ...';
		} else {
			$response['status']  = 'success';
			$response['message'] = 'Data Berhasil di Hapus ...';
		}
		echo json_encode($response);
		//redirect('master/Alat');
	}

}