<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

	public function index()
    {
        $data['judul']  = "Halaman Profile ";
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('pengunjung/pengguna',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);  
    }
    
	public function edit()
    {
        $data['judul']  = "Edit Profile ";
        $data['user']   = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name','Full Name','required|trim');

        if($this->form_validation->run() == false) {
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('user/edit',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang di upload
            $upload_image = $_FILES['image']['name'];
            if($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './aseets/img/profile/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                    
                if ($this->upload->do_upload('image')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit Profil Berhasil </div>');
            redirect('user');

        }
    }

    // public function lapor()
    // {
    //     $data['judul']  = "Halaman Profile ";
    //     $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
    //     $this->load->view('pengunjung/Tempalte/headeruser', $data);
    //     $this->load->view('pengunjung/Tempalte/sidebar', $data);
    //     $this->load->view('user/lapor',$data);
    //     $this->load->view('pengunjung/Tempalte/footeruser', $data);  
    // }
    
    public function Kontak()
    {
        $data['judul']  = "Halaman Profile ";
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('user/kontak',$data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);  
    }
	
}