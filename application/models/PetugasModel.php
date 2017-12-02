<?php

class PetugasModel extends CI_Model{

	function read($where, $table){
		$this->db->where_not_in($table, $where);
		return $this->db->get('petugas');
	}

	function tambah(){
		$id_petugas		= $this->input->post('id_petugas');
		$nama_petugas	= $this->input->post('nama_petugas');
		$alamat			= $this->input->post('alamat');
		$no_hp 			= $this->input->post('no_hp');
		$jk 			= $this->input->post('jk');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$tmpt_lahir		= $this->input->post('tmpt_lahir');
		$username 		= $this->input->post('username');
		$jabatan 		= $this->input->post('jabatan');
		$password 		= $this->input->post('password1');

		$dataLogin = array(
			'username' => $username,
			'password' => base64_encode($password)
		);
		$dataPtg = array(
			'id_petugas' 	=> $id_petugas,
			'nama_petugas' 	=> $nama_petugas,
			'alamat' 		=> $alamat,
			'no_hp' 		=> $no_hp,
			'jk' 			=> $jk,
			'tgl_lahir' 	=> $tgl_lahir,
			'tmpt_lahir' 	=> $tmpt_lahir,
			'username' 		=> $username,
			'jabatan' 		=> $jabatan
		);

		$this->db->insert('login', $dataLogin);
		$this->db->insert('petugas', $dataPtg);
	}

	function auto(){
		$this->db->select('RIGHT(petugas.id_petugas, 4) as kode');
		$this->db->order_by('id_petugas','DESC');
		$this->db->limit(1);
		$query = $this->db->get('petugas');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 4, "0", STR_PAD_LEFT);
		$viewcode="PTG".$maxcode;
		return $viewcode;
	}

}