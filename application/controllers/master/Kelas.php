<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('KelasModel');
			$this->load->helper('url');
	}

	public function index(){
		$data = array(
			'title' => 'Data Kelas | Halaman '.$this->session->userdata('jabatan'),
			'kelas'	=> $this->KelasModel->read()->result()
		);

		$this->layouts->utama('master/Kelas/KelasView', $data);
	}

	public function tambah(){
		$data = array(
			'title' => 'Tambah Kelas | Halaman '.$this->session->userdata('jabatan'),
			'kode'	=> $this->KelasModel->auto()
		);

		if ($this->input->post('submit')) {
			$this->KelasModel->tambah();
			redirect('master/Kelas');
		}

		$this->layouts->utama('master/Kelas/KelasInsert', $data);
	}

	public function edit($id_kelas){
		$where = array('id_kelas' => $id_kelas);
		$data = array(
			'kelas' 	=> $this->KelasModel->edit($where, 'kelas')->result(),
			'title'	=> 'Ubah Data Kelas | Halaman '.$this->session->userdata('jabatan')
		);

		$this->layouts->utama('master/Kelas/KelasEdit', $data);
	}

	public function update(){
		$id_kelas 	= $this->input->post('id_kelas');
		$nama_kelas 	= $this->input->post('nama_kelas');

		$data = array(
			'nama_kelas' => $nama_kelas
		);

		$where = array('id_kelas' => $id_kelas);

		$this->KelasModel->update($where,$data,'kelas');
		redirect('master/Kelas');
	}

	public function hapus($id_kelas){
		$where = array('id_kelas' => $id_kelas);
		
		if ($this->KelasModel->hapus($where,'kelas')) {
			$response['status']  = 'error';
			$response['message'] = 'Data Gagal di Hapus ...';
		} else {
			$response['status']  = 'success';
			$response['message'] = 'Data Berhasil di Hapus ...';
		}
		echo json_encode($response);
	}

}