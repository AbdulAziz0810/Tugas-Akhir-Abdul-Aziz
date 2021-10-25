<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Videographer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

	public function penjual()
    {
        $data['judul']  = "Halaman videographer ";
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $data['jumlah'] = $this->model_invoice->jumlah();
        $data['jumlah1'] = $this->model_invoice->jumlah1();
        $data['jumlah2'] = $this->model_invoice->jumlah2();
        $data['jumlah3'] = $this->model_invoice->jumlah3();
        $data['jumlah4'] = $this->model_invoice->jumlah4();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('pengunjung/penjual',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
        
    }

	public function dashboard()
    {
        $data['judul']  = "Halaman dashboard ";
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
      
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('pengunjung/dashboard',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }
        
	public function menajemen()
    {
        $data['judul']  = "Halaman Menu ";
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->upload_video->tampil_user()->result();;
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('pengunjung/menajemen',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
        
    } 

    public function edit($id)
    {
        $where = array('id'=>$id);
        $data['judul']  = "Halaman Edit ";
        $data['menu'] = $this->upload_video->edit_menajemen($where, 'user')->result();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('user/edit_menajemen',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }

    public function update(){
        $id         = $this->input->post('id');
        $name       = $this->input->post('name');
        $role_id    = $this->input->post('role_id');
        $email      = $this->input->post('email');

        $data = array(
            'name'      => $name,
            'role_id'   => $role_id,
            'email'     => $email,
        );
        $where = array(
            'id' => $id
        );
        $this->upload_video->update_data($where,$data,'user');
        redirect('Videographer/menajemen');

    }
    public function hapus($id){
        $where = array('id' => $id);
        $this->upload_video->hapus_data($where, 'user');
        redirect('Invoice');
    }

	
}