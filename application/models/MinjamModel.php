<?php

class MinjamModel extends CI_Model{

	function bacaDetailPinjam($where, $table){
		$this->db->select('detail_peminjam.id_detail, detail_peminjam.id_peminjam, detail_peminjam.id_alat, alat.nama_alat, detail_peminjam.jumlah')
		->join('alat','detail_peminjam.id_alat = alat.id_alat');
		$this->db->where($table, $where);
		return $this->db->get('detail_peminjam');
	}

	function inputDetail(){
		$id_detail	 = $this->input->post('id_detail');
		$id_peminjam = $this->input->post('id_peminjam');
		$id_alat	 = $this->input->post('id_alat');
		$jumlah		 = $this->input->post('jumlah_detail');

		$data = array(
			'id_detail' => $id_detail,
			'id_peminjam' => $id_peminjam,
			'id_alat' => $id_alat,
			'jumlah' => $jumlah
		);

		$this->db->insert('detail_peminjam', $data);
	}

	function hapusDetail($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function auto(){
		$this->db->select('RIGHT(peminjam.id_peminjam, 5) as kode');
		$this->db->order_by('id_peminjam','DESC');
		$this->db->limit(1);
		$query = $this->db->get('peminjam');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 5, "0", STR_PAD_LEFT);
		$viewcode="PJM".$maxcode;
		return $viewcode;
	}

	function autoDetail(){
		$this->db->select('RIGHT(detail_peminjam.id_detail, 6) as kode');
		$this->db->order_by('id_peminjam','DESC');
		$this->db->limit(1);
		$query = $this->db->get('detail_peminjam');

		if($query-> num_rows() <> 0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$maxcode=str_pad($kode, 6, "0", STR_PAD_LEFT);
		$viewcode="DTL".$maxcode;
		return $viewcode;
	}

}