<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minjam extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('MinjamModel');
		$this->load->model('AlatModel');
		$this->load->helper('url');
	}

	public function index(){
		$data = array(
			'title' => 'Transaksi Minjam | Halaman '.$this->session->userdata('jabatan')
		);

		$this->layouts->utama('transaksi/Minjam/MinjamView', $data, 'transaksi/Minjam/footerMinjam');
	}

	public function tambah(){
		$data = array(
			'title' 	=> 'Transaksi Minjam | Halaman '.$this->session->userdata('jabatan'),
			'kode'		=> $this->MinjamModel->auto(),
			'kelas'		=> $this->MinjamModel->bacaKelas()->result(),
			'keperluan'	=> $this->MinjamModel->bacaKeperluan()->result()
			//'alat'		=> $this->AlatModel->readDetail()->result()
		);

		if ($this->input->post('submit')) {
			$result = $this->MinjamModel->tambah();
			if ($result) {
				redirect('transaksi/Minjam/tambah');
			}
		}

		$this->layouts->utama('transaksi/Minjam/MinjamInsert', $data, 'transaksi/Minjam/footerMinjam');
	}

	public function bacaDetail(){
		$data = array(
			'detailPinjam' => $this->MinjamModel->bacaDetailPinjam($this->MinjamModel->auto(), 'id_peminjam')->result()
			//'detailPinjam' => $this->MinjamModel->read()->result()
		);

		$this->load->view('transaksi/Minjam/detailPinjam', $data);
	}

	public function tampilData(){
		$result = array('data' => array());

		$data = $this->MinjamModel->bacaData();

		foreach ($data as $key => $value){
			$button = '<button type="button" id="lihatDataPinjam" class="btn btn-primary" data-id="'.$value['id_peminjam'].'">Lihat</button>';

			$result['data'][$key] = array(
				$value['id_peminjam'],
				$value['nis'],
				$value['nama_peminjam'],
				$value['no_hp'],
				$value['nama_keperluan'],
				$value['nama_kelas'],
				$value['tgl_peminjaman'],
				$value['tgl_pengembalian_rencana'],
				$button
			);
		}

		echo json_encode($result);
	}

	public function inputDetail(){
		$result1 = $this->MinjamModel->inputDetail();
		

		$msg['success'] = false;
		
		if ($result1) {
			$result2 = $this->MinjamModel->kurangStok();
			if($result1 && $result2){
				$msg['success'] = true;
			}
		}
		
		echo json_encode($msg);
	}

	public function hapusDetail($id_detail, $id_alat, $jumlah){
		$where = array('id_detail' => $id_detail);
		$result1 = $this->MinjamModel->hapusDetail($where,'detail_peminjam');
		$result2 = $this->MinjamModel->tambahStok($id_alat, $jumlah);

		if ($result1 && $result2) {
			$msg['success'] = true;
		} else {
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	public function autoDetail(){
		$result = $this->MinjamModel->autoDetail();
		echo $result;
	}

	public function stokAlat(){
		$result = $this->AlatModel->readDetail()->result();

		echo json_encode($result);
	}

}