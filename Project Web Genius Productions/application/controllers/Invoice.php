<?php

class Invoice extends CI_Controller
{
    public function index()
    {
        $data['judul']  = "Halaman Invoice ";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->tampil_data();
        $data['bayar'] = $this->model_invoice->BuktiBayar();
        
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('keranjang/voice', $data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }

    public function detail($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        $data['judul']  = "Halaman Invoice ";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->model_invoice->tampil_data();
        $data['inc'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('keranjang/detail_voice', $data);
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }

    // public function Terima_Pesyanan($id) {
    //     var_dump($id);
    //     die;
    //     $data = array(
    //         'id_invoice' =>$this->input->post('id'),
    //         'status' => '3'
    //     );

    //     $this->db->where('id_invoice' , $id['id_invoice']);
    //     $this->db->update('tb_pesanan' , $data);
    // }

    public function bayar($id_invoice)
    {

        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['judul']  = "Halaman Bayar ";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['invoice'] = $this->model_invoice->tampil_data();
            $data['inc'] = $this->model_invoice->ambil_id_invoice($id_invoice);
            $data['v_bayar'] = $this->model_invoice->detail_bayar($id_invoice);
            $this->load->view('pengunjung/Tempalte/headeruser', $data);
            $this->load->view('pengunjung/Tempalte/sidebar', $data);
            $this->load->view('keranjang/bayar', $data);
            $this->load->view('pengunjung/Tempalte/footeruser', $data);
        } else {

            // $name = $this->input->post('name');
            // $pembayaran = $this->input->post('pembayaran');
            // $nominal = $this->input->post('nominal');


            // cek jika ada gambar yang di upload
            $upload_image = $_FILES['image_bayar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size']      = '500000';
                $config['upload_path']   = './aseets/img/bayar/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image_bayar')) {
                    // $upload_image = $this->upload->data('image_bayar');

                    // $id_invoice = $this->input->post('pembayaran');
                    $data = array(
                        // 'status' => 1,
                        'image_bayar' => $upload_image,

                    );
                    // var_dump($id_invoice);
                    // die;
                    $this->db->where('id', $id_invoice);
                    $this->db->update('tb_invoice', $data);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Bukti Bayar Berhasil Di Upload </div>');
            redirect('Services/detail_keranjang');
        }
    }

    public function bukti_bayar($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        

            $data['judul']  = "Halaman Video";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['invoice'] = $this->model_invoice->tampil_data();
            $data['inc'] = $this->model_invoice->ambil_id_invoice($id_invoice);
            $data['v_bayar'] = $this->model_invoice->detail_bayar($id_invoice);
            $this->load->view('pengunjung/Tempalte/headeruser', $data);
            $this->load->view('pengunjung/Tempalte/sidebar', $data);
            $this->load->view('keranjang/b_bayar', $data);
            $this->load->view('pengunjung/Tempalte/footeruser', $data);
       
    }

    // upload vidio




    public function upload_vidio($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['judul']  = "Halaman Video";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['invoice'] = $this->model_invoice->tampil_data();
            $data['inc'] = $this->model_invoice->ambil_id_invoice($id_invoice);
            $data['v_bayar'] = $this->model_invoice->detail_bayar($id_invoice);
            $this->load->view('pengunjung/Tempalte/headeruser', $data);
            $this->load->view('pengunjung/Tempalte/sidebar', $data);
            $this->load->view('keranjang/videojasa', $data);
            $this->load->view('pengunjung/Tempalte/footeruser', $data);
        } else {

        }
    }
    
    public function update_vidio()
    {
        $upload_video = $_FILES['video_jasa']['name'];
        
        $id_inv = $_POST['id_pembayaran'];
        // var_dump($id_inv, $upload_video);
        // die;
        if ($upload_video) {
            $config['allowed_types'] = 'mp4';
            $config['max_size']      = '500000';
            $config['upload_path']   = './aseets/video_jasa/';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('video_jasa')) {
                // $upload_image = $this->upload->data('image_bayar');

                // $id_invoice = $this->input->post('pembayaran');
                $data = array(
                    // 'status' => 1,
                    'video_jasa' => $upload_video,
                );

                $this->db->where('id', $id_inv);
                $this->db->update('tb_invoice', $data);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Bukti Bayar Berhasil Di Upload </div>');
        // $this->load->view('pengunjung/Tempalte/headeruser', $data);
        // $this->load->view('pengunjung/Tempalte/sidebar', $data);
        // $this->load->view('keranjang/videojasa', $data);
        // $this->load->view('pengunjung/Tempalte/footeruser', $data);
        // redirect('Invoice/update_vidio/');
        redirect(base_url()."Invoice/upload_vidio/".$id_inv);
    }

    public function download_vidio($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['judul']  = "Halaman Video";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['invoice'] = $this->model_invoice->tampil_data();
            
            $data['inc'] = $this->model_invoice->ambil_id_invoice($id_invoice);
            $data['v_bayar'] = $this->model_invoice->detail_bayar($id_invoice);
            $this->load->view('pengunjung/Tempalte/headeruser', $data);
            $this->load->view('pengunjung/Tempalte/sidebar', $data);
            $this->load->view('keranjang/download', $data);
            $this->load->view('pengunjung/Tempalte/footeruser', $data);
        } else {
          
                // $where = array('id' => $idInvoice);
                // $this->model_invoice->hapus_data($where, 'tb_invoice');
                // $this->model_invoice->hapus_data($where, 'tb_pesanan');
                // redirect('Invoice');
        
        
        

        }
    }


    public function selesai($id_invoice) {
        
        $data= array (
            'id' => $id_invoice,
            'tanggal_pesanan' => '0000-00-00',
            
        
            
        );

        $this->model_invoice->selesai($data);
        redirect('Services/detail_pengunjung');


    }

    
}
