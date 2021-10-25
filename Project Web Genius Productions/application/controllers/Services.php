<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
   
    public function tambah_ke_keranjang($id)
    {
        $barang = $this->upload_barang->find($id);
        $data = array(
            'id'        => $barang->id_brg,
            'qty'       => 1,
            'price'     => $barang->harga,
            'name'      => $barang->kategori_brg
            
        );

        $this->cart->insert($data);
        redirect('Services/detail_keranjang');
    }

    public function detail_keranjang()
    {
        $data['judul']  = "order";
        $data['user']   = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $data['invoice_bayar'] = $this->model_invoice->belum_bayar();
        $this->db->where('id_pemesan',$this->session->userdata('id'));
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('keranjang/belanja');
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }

    public function detail_pengunjung()
    {
        $data['judul']  = "order pengunjung";
        $data['user']   = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $data['invoice_bayar'] = $this->model_invoice->belum_bayar();
        $this->db->where('id_pemesan',$this->session->userdata('id'));
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('keranjang/belanja');
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('Services/detail_keranjang');
    }

    public function pembayaran()
    {
        $data['judul']  = "Pembayaran";
        $this->form_validation->set_rules('nama', 'Name','required|trim');
        $data['user']   = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        $data['video_G'] = $this->upload_barang->video_graph()->result();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('keranjang/pembayaran');
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
    }

    public function pesanan()
    {
        $data['judul']  = "Pemesanan";
        $data['user']   = $this->db->get_where('user', ['email'=> $this->session->userdata('email')])->row_array();
        
        $is_processed = $this->model_invoice->index();        
        if($is_processed){
        $this->cart->destroy();
        $this->load->view('pengunjung/Tempalte/headeruser', $data);
        $this->load->view('pengunjung/Tempalte/sidebar', $data);
        $this->load->view('keranjang/pesanan');
        $this->load->view('pengunjung/Tempalte/footeruser', $data);
        }else {
            echo "Maaf, Pesanan Anda Gagal";
        }
    }
    


}
