<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keperluan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('KeperluanModel');
			$this->load->helper('url');
	}

	public function index(){
		$data = array(
			'title' 	=> 'Data Keperluan | Halaman '.$this->session->userdata('jabatan'),
			'keperluan'	=> $this->KeperluanModel->read()->result()
		);

		$this->layouts->utama('master/Keperluan/KeperluanView', $data);
	}

	public function tambah(){
		$data = array(
			'title' => 'Tambah Keperluan | Halaman '.$this->session->userdata('jabatan'),
			'kode'	=> $this->KeperluanModel->auto()
		);

		if ($this->input->post('submit')) {
			$this->KeperluanModel->tambah();
			redirect('master/Keperluan');
		}

		$this->layouts->utama('master/Keperluan/KeperluanInsert', $data);
	}

	public function edit($id_keperluan){
		$where 	= array('id_keperluan' => $id_keperluan);
		$data 	= array(
			'keperluan' => $this->KeperluanModel->edit($where, 'keperluan')->result(),
			'title'		=> 'Ubah Data Keperluan | Halaman '.$this->session->userdata('jabatan')
		);

		$this->layouts->utama('master/Keperluan/KeperluanEdit', $data);
	}

	public function update(){
		$id_keperluan 	= $this->input->post('id_keperluan');
		$nama_keperluan	= $this->input->post('nama_keperluan');

		$data = array(
			'nama_keperluan' => $nama_keperluan
		);

		$where = array('id_keperluan' => $id_keperluan);

		$this->KeperluanModel->update($where,$data,'keperluan');
		redirect('master/Keperluan');
	}

	public function hapus($id_keperluan){
		$where = array('id_keperluan' => $id_keperluan);
		
		if ($this->KeperluanModel->hapus($where,'keperluan')) {
			$response['status']  = 'error';
			$response['message'] = 'Data Gagal di Hapus ...';
		} else {
			$response['status']  = 'success';
			$response['message'] = 'Data Berhasil di Hapus ...';
		}
		echo json_encode($response);
	}

}