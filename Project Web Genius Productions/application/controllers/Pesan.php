<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function jasa()
    {
        $data['judul']  = "Halaman Pesan ";
        $data['barang']= $this->upload_barang->tampilkan_barang()->result();
        $data['video_G'] = $this->upload_barang->video_graph()->result();
        $this->load->view('pengunjung/Tempalte/header', $data);
        $this->load->view('pengunjung/jasa');
        $this->load->view('pengunjung/Tempalte/footer');
    }
    public function order()
    {
        $data['judul']  = "Halaman Pesan ";
        $data['pricers']= $this->upload_pemesanan->tampilkan_pemesanan()->result();
        $this->load->view('pengunjung/Tempalte/header', $data);
        $this->load->view('pengunjung/order');
        $this->load->view('pengunjung/Tempalte/footer');
    }

    public function terimaPesanan($idInvoice, $status = "NULL"){
        if($status == 1){
            // Status diterima
            // echo 'true';
            $this->db->set('status', '1');
            $this->db->where('id',$idInvoice);
            $this->db->update('tb_invoice');
            
        } else if($status == 0){
            // Status ditolak
            // echo 'false';
            $this->db->set('status' , '0');
            $this->db->where('id',$idInvoice);
            $this->db->update('tb_invoice');

        }
        redirect('Invoice');
    }

    public function tolakPesanan($idInvoice){
        // $where = array('id' => $idInvoice);
        // $this->model_invoice->hapus_data($where, 'tb_invoice');
        // $this->model_invoice->hapus_data($where, 'tb_pesanan');
        // redirect('Invoice');

        $data= array (
            'id' => $idInvoice,
            'tanggal_pesanan' =>NULL,
            
        );

        $this->model_invoice->tolak($data);
        redirect('Invoice');



    }
}