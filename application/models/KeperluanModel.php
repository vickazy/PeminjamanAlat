<?php

class KeperluanModel extends CI_Model{

	function read(){
		return $this->db->get('keperluan');
	}

	function tambah(){
		$id_keperluan 	= $this->input->post('id_keperluan');
		$nama_keperluan = $this->input->post('nama_keperluan');

		$data = array(
			'id_keperluan'	 => $id_keperluan,
			'nama_keperluan' => $nama_keperluan
		);

		$this->db->insert('keperluan', $data);
	}

	function edit($where, $table){
		return $this->db->get_where($table, $where);
	}

	function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function auto(){
		$this->db->select('RIGHT(keperluan.id_keperluan, 3) as kode');
		$this->db->order_by('id_keperluan','DESC');
		$this->db->limit(1);
		$query = $this->db->get('keperluan');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 3, "0", STR_PAD_LEFT);
		$viewcode="KPL".$maxcode;
		return $viewcode;
	}

}