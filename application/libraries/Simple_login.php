<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan'); 

class Simple_login {

	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {
		$this->CI =& get_instance();
	}

	// Fungsi login
	public function login($username, $password) {
		$query = $this->CI->db->get_where('login', array('username'=>$username,'password' => md5($password)));
		$query2 = $this->CI->db->get_where('siswa', array('nis'=>$username,'password' => md5($password)));
		if($query->num_rows() == 1) {
			$row 	= $this->CI->db->query('SELECT * FROM petugas where username = "'.$username.'"');
			$admin 	= $row->row();
			$id 	= $admin->id_user;
			$id_petugas = $admin->id_petugas;
			$nama_petugas   = $admin->nama_petugas;
			$jabatan = $admin->jabatan;

			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('id_login', uniqid(rand()));
			$this->CI->session->set_userdata('id', $id);
			$this->CI->session->set_userdata('id_petugas', $id_petugas);
			$this->CI->session->set_userdata('nama_petugas', $nama_petugas);
			$this->CI->session->set_userdata('jabatan', $jabatan);
			redirect(base_url(''));
		}else if($query2->num_rows() == 1){
			$siswa= $query2->row();
			$id_siswa= $siswa->nis;
			$nama_siswa= $siswa->nama;
			$nama_ortu= $siswa->nama_ortu;
			$no_hp= $siswa->no_hp;
			$kelas= $siswa->id_kelas;
			$jabatan= 'Siswa';

			$array = array(
				'username' => $id_siswa,
				'nama_petugas'=> $nama_siswa,
				'nama_ortu'=> $nama_ortu,
				'no_hp'=> $no_hp,
				'kelas'=> $kelas,
				'jabatan'=> $jabatan
			);
			
			$this->CI->session->set_userdata($array);
			redirect(base_url('master/Siswa'));
		}else{
			$this->CI->session->set_flashdata('cekLogin','onload="flashData(1)"');
			redirect(base_url('login'));
		}
		return false;
	}

	// Proteksi halaman
	public function cek_login($cek = NULL) {
		if($this->CI->session->userdata('username') == '') {
			$this->CI->session->set_flashdata('cekLogin', "onload='flashData(2)'");
			redirect(base_url('login'));
		} //else if($cek == NULL){
		// 	// aaa
		// } else if($cek != 'Admin') {
		// 	// $this->CI->session->set_flashdata('cekLogin', "onload='flashData(2)'");
		// 	redirect(base_url());
		// }

		if ($cek != NULL) {
			if ($cek != $this->CI->session->userdata('jabatan')) {
				redirect(base_url('Error404'));
			} 
		} else {
			if ($this->CI->session->userdata('jabatan') == 'Siswa') {
				redirect(base_url('master/Siswa'));
			}
		}
	}

	// Fungsi logout
	public function logout() {
		//$this->CI->session->unset_userdata('username');
		//$this->CI->session->unset_userdata('id_login');
		//$this->CI->session->unset_userdata('id');
		//$this->CI->session->unset_userdata('nama_petugas');
		//$this->CI->session->set_flashdata('cekLogin','Anda berhasil logout');

		$this->CI->session->sess_destroy();
		redirect(base_url('login'));
	}
}