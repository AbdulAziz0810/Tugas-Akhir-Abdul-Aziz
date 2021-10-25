<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{

    public function price()
    {   
        $data['user']= $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $data['barang']= $this->upload_barang->tampilkan_barang()->result();
        $data['judul']  = "Halaman Services ";
        $this->load->view('pengunjung/Tempalte/header', $data);
        $this->load->view('pengunjung/price');
        $this->load->view('pengunjung/Tempalte/footer');
    }

    public function video()

    {
        $idUser = $this->session->userdata('id');
        $roleId = $this->session->userdata('role_id');
        $email = $this->session->userdata('email');

        $data['judul']  = "Halaman Upload ";
        if($roleId < 2){
            // Admin
            $data['gallery'] = $this->upload_video->tampilkan_video()->result();
        } else {
            // Pengguna
            $data['gallery'] = $this->upload_video->tampilkan_video($idUser)->result();
        }
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('pengunjung/video', $data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }
    public function hapus($id){
        $where = array('id_video' => $id);
        $this->upload_video->hapus_video($where, 'galery');
        redirect('Upload/video');
    }

    public function tambah_jalan()

    {

        // $config['upload_path']          = './aseets/video/';
        // $config['allowed_types']        = 'mp4';
        // $config['max_size']             = 100000;

        // $this->load->library('upload', $config);
        // $this->upload->initialize($config);

        // if ( ! $this->upload->do_upload('userFile'))
        // {
        //         echo "Gagal Tambah";
        // }
        // else
        // {
                $name = $this->input->post('name');
                // $video = $this->upload->data();
                // $video = $video['file_name'];
                $video = $this->input->post('video', TRUE);
                $id_user = $this->session->userdata('id');
                $judul_video = $this->input->post('judul_video', TRUE);
                $deskripsi = $this->input->post('deskripsi', TRUE);
                $kategori = $this->input->post('kategori', TRUE);

                $data = array(
                    'id_user'=> $id_user,
                    'judul_video' => $judul_video,
                    'kategori' => $kategori,
                    'deskripsi' => $deskripsi,
                    'video' => $video,
                );
            $this->db->set('name', $name);
            $this->db->insert('galery', $data);
            redirect('Upload/video');

        

    }



    public function barang()

    {
        $data['judul']  = "Halaman Upload ";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['barang'] = $this->upload_barang->tampilkan_barang()->result();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('pengunjung/barang', $data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }

    public function tambah_aksi()

    {

        $kategori_brg    = $this->input->post('kategori_brg');
        $harga           = $this->input->post('harga');
        $durasi          = $this->input->post('durasi');
        $proses          = $this->input->post('proses');
        $bonus           = $this->input->post('bonus');


        $data = array(
            'kategori_brg'  => $kategori_brg,
            'harga'         => $harga,
            'durasi'        => $durasi,
            'proses'        => $proses,
            'bonus'         => $bonus,
        );

        $this->upload_barang->tambah_barang($data, 'pricing');
        redirect('Upload/barang');
    }

    public function videograph()
    {
        
        $data['judul']  = "Halaman Videographer ";
        $idUser = $this->session->userdata('id');
        $roleId = $this->session->userdata('role_id');
        $email = $this->session->userdata('email');
       
        if($roleId < 2){
            // Admin
            $data['video_G'] = $this->upload_barang->video_graph()->result();
        } else {
            // Pengguna
            $data['video_G'] = $this->upload_barang->video_graph($idUser)->result();
        }
        $this->load->view('pengunjung/Tempalte/header', $data);
        $this->load->view('pengunjung/pemesanan', $data);
        $this->load->view('pengunjung/Tempalte/footer');
    }
    public function video_graph()

    {
        $data['judul']  = "Halaman Upload ";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['video_graph'] = $this->upload_barang->tampilkan_video_graph();
        $data['judul']  = "Halaman videographer ";
        $this->load->view('pengunjung/Tempalte/header', $data);
        $this->load->view('pengunjung/videograph');
        $this->load->view('pengunjung/Tempalte/footer');
    }
}
