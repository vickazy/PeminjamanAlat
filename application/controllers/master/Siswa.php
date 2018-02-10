<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('SiswaModel');
		$this->load->model('AlatModel');
		$this->load->helper('url');
	}

	public function index(){
		$this->simple_login->cek_login('Siswa'); // Proteksi halaman

		$data = array(
			'title' => 'Halaman '. $this->session->userdata('jabatan')
		);

		$this->layouts->utama('master/Siswa/SiswaView', $data);
	}

	public function Daftar(){
		$data = array(
			'kelas' => $this->SiswaModel->bacaKelas()->result()
		);

		if ($this->input->post('submit')) {
			$this->SiswaModel->siswaDaftar();
			$this->session->set_flashdata('cekLogin','onload="flashData(3)"');
			redirect('login');
		}

		$this->load->view('master/Siswa/SiswaDaftar', $data);
	}

	public function Minjam(){
		$this->simple_login->cek_login('Siswa'); // Proteksi halaman

		$data = array(
			'title'		=> 'Minjam Alat | Halaman '. $this->session->userdata('jabatan'),
			'keperluan'	=> $this->SiswaModel->bacaKeperluan()->result()
			// 'kode'		=> $this->SiswaModel->auto(),
		);

		if ($this->input->post('submit')) {
			$result = $this->SiswaModel->tambah();
			if ($result) {
				redirect('master/Siswa','refresh');
			}
		}

		$this->layouts->utama('master/Siswa/SiswaMinjam', $data, 'master/Siswa/footerSiswa');
	}


	// public function autoDetail(){
	// 	$result = $this->SiswaModel->autoDetail();
	// 	echo $result;
	// }

	public function bacaDetail(){
		$data = array(
			'detailPinjam' => $this->SiswaModel->bacaDetailPinjam($this->session->userdata('username'))->result()
		);

		$this->load->view('master/Siswa/detailPinjam', $data);
	}

	public function inputDetail(){
		$result1 = $this->SiswaModel->inputDetail();
		

		$msg['success'] = false;
		
		if ($result1) {
			$result2 = $this->SiswaModel->kurangStok();
			if($result1 && $result2){
				$msg['success'] = true;
			}
		}

		echo json_encode($msg);
	}

	public function hapusDetail($id_detail, $id_alat, $jumlah){
		$where = array('id_detail' => $id_detail);
		$result1 = $this->SiswaModel->hapusDetail($where,'peminjam_detail');
		$result2 = $this->SiswaModel->tambahStok($id_alat, $jumlah);

		if ($result1 && $result2) {
			$msg['success'] = true;
		} else {
			$msg['success'] = false;
		}
		echo json_encode($msg);
	}

	public function stokAlat(){
		$result = $this->AlatModel->readDetail()->result();

		echo json_encode($result);
	}

	public function cekUsername(){
		# code...
	}

}