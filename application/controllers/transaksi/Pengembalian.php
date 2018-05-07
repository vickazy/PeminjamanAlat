<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->helper('url');
		$this->load->model('PengembalianModel');
	}

	public function index(){
		$data = array(
			'title' => 'Pengembalian | Halaman '.$this->session->userdata('jabatan')
		);

		$this->layouts->utama('transaksi/Pengembalian/PengembalianView', $data, 'transaksi/Pengembalian/footerPengembalian');
	}

	public function pengembalianAlat(){
		$result = $this->PengembalianModel->pengembalianAlat($this->input->post('id_peminjam'));
		$msg['success'] = false;
		if ($result){
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	public function tampilData(){
		$result = array('data' => array());
		$data = $this->PengembalianModel->tampilData();

		if($data){
			foreach ($data as $key => $value) {
				$button = '<button type="button" id="kembaliAlat" class="btn btn-danger" data-id="'.$value['id_peminjam'].'">Lihat</button>';

				$result['data'][$key] = array(
					$value['id_peminjam'],
					$value['nis'],
					$value['nama_peminjam'],
					$value['no_hp'],
					$value['nama_keperluan'],
					$value['nama_kelas'],
					$value['tgl_req_peminjaman'],
					$value['tgl_peminjaman'],
					$value['tgl_pengembalian_rencana'],
					$button
				);
			}
		}

		echo json_encode($result);
	}

	public function tampilSudahdiKembalikan(){
		$result = array('data' => array());
		$data = $this->PengembalianModel->tampilSudahdiKembalikan();

		if($data){
			foreach ($data as $key => $value) {
				$button = '<button type="button" id="kembaliAlat" class="btn btn-danger" data-id="'.$value['id_peminjam'].'">Lihat</button>';

				$result['data'][$key] = array(
					$value['id_pengembalian'],
					$value['id_peminjam'],
					$value['nis'],
					$value['nama_peminjam'],
					$value['tgl_peminjaman'],
					$value['tgl_pengembalian'],
					$button
				);
			}
		}

		echo json_encode($result);
	}

}