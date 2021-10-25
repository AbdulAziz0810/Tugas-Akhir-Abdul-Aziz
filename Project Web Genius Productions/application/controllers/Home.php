<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function index()
	{
		$data['judul']  = "Halaman Home ";
		$this->load->view('pengunjung/Tempalte/header', $data);
		$this->load->view('pengunjung/home');
		$this->load->view('pengunjung/Tempalte/footer');
	}
}
