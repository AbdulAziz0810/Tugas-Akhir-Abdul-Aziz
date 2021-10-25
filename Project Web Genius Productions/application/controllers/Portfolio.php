<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portfolio extends CI_Controller
{


	public function galery()
	{
		$data['judul']  = "Halaman portfolio ";
		$data['gallery'] = $this->upload_video->tampilkan_video()->result();
		$this->load->view('pengunjung/Tempalte/header', $data);
		$this->load->view('pengunjung/galery');
		$this->load->view('pengunjung/Tempalte/footer');
	}


	public function detail_video($id_video)
	{
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['Komentar'] = $this->upload_video->komentar($id_video);
		$data['judul']  = "Halaman portfolio ";
		$data['gallery'] = $this->upload_video->dtl_video($id_video);
		$this->load->view('pengunjung/Tempalte/header', $data);
		$this->load->view('pengunjung/detail_video', $data);
		$this->load->view('pengunjung/Tempalte/footer');
	}

	

	public function komentar()
	{

		
	if(is_logged_in()) {
		redirect('');
	}else {
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$nama = $this->input->post('nama');
		$id_video = $this->input->post('id_video');
		$komentar = $this->input->post('komentar');
		$komen = array(

			'nama' => $nama,
			'id_video' => $id_video,
			'komentar' => $komentar,
			'tgl_komentar' => date('Y-m-d'),

		);
		$this->db->insert('komentar', $komen);
		redirect('Portfolio/detail_video/'.$id_video);

	}
	   

				
	}
}
