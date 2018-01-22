<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->model('SiswaModel');
		$this->load->helper('url');
	}

	public function index(){
		$this->simple_login->cek_login('Siswa'); // Proteksi halaman

		$data = array(
			'title' => 'Halaman '. $this->session->userdata('jabatan')
		);

		$this->layouts->utama('master/Siswa/SiswaView', $data);
	}

	public function Minjam(){
		$this->simple_login->cek_login('Siswa'); // Proteksi halaman

		$data = array(
			'title'		=> 'Minjam Alat | Halaman '. $this->session->userdata('jabatan'),
			'keperluan'	=> $this->SiswaModel->bacaKeperluan()->result(),
			'kode'		=> $this->SiswaModel->auto(),
		);

		$this->layouts->utama('master/Siswa/SiswaMinjam', $data, 'master/Siswa/footerSiswa');
	}

	public function Daftar(){
		$data = array(
			'kelas' => $this->SiswaModel->bacaKelas()->result()
		);

		if ($this->input->post('submit')) {
			$this->SiswaModel->tambah();
			$this->session->set_flashdata('cekLogin','onload="flashData(3)"');
			redirect('login');
		}

		$this->load->view('master/Siswa/SiswaDaftar', $data);
	}

	public function bacaDetail(){
		$data = array(
			'detailPinjam' => $this->SiswaModel->bacaDetailPinjam($this->SiswaModel->auto(), 'id_peminjam')->result()
		);

		$this->load->view('master/Siswa/detailPinjam', $data);
	}

}