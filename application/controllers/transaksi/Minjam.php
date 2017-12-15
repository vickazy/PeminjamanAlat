<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minjam extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('MinjamModel');
			$this->load->helper('url');
	}

	public function index(){

	}

	public function tambah(){
		$data = array(
			'title' 	=> 'Transaksi Minjam | Halaman '.$this->session->userdata('jabatan'),
			'kode'		=> $this->MinjamModel->auto(),
			'id_detail' => $this->MinjamModel->autoDetail()
		);

		/*if ($this->input->post('submit')) {
			$this->AlatModel->tambah();
			redirect('master/Alat');
		}*/

		$this->layouts->utama('transaksi/Minjam/MinjamInsert', $data);
	}

	public function inputDetail(){
		if ($this->input->post()){
			$this->MinjamModel->inputDetail();
		}
	}

	public function hapusDetail($id_detail){
		$where = array('id_detail' => $id_detail);

		if ($this->MinjamModel->hapusDetail($where,'detail_peminjam')) {
			$response['status']  = 'error';
		} else {
			$response['status']  = 'success';
		}
		echo json_encode($response);
	}

	public function bacaDetail(){
		$data = array(
			'detailPinjam' => $this->MinjamModel->bacaDetailPinjam($this->MinjamModel->auto(), 'id_peminjam')->result()
			//'detailPinjam' => $this->MinjamModel->read()->result()
		);

		$this->load->view('transaksi/Minjam/detailPinjam', $data);
	}

}