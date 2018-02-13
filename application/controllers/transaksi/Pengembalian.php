<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login(); // Proteksi halaman
		$this->load->library('Layouts');
		$this->load->helper('url');
	}

	public function index(){
		$data = array(
			'title' => 'Pengembalian | Halaman '.$this->session->userdata('jabatan')
		);

		$this->layouts->utama('transaksi/Pengembalian/PengembalianView', $data, 'transaksi/Pengembalian/footerPengembalian');
	}

}