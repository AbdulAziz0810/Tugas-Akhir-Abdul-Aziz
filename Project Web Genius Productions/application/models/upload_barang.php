<?php

class Upload_barang extends CI_Model{
    public function tampilkan_barang(){
        return $this->db->get('pricing');
    }
    public function tambah_barang($data,$table){
        $this->db->insert($table,$data);
    }
    public function find($id)
    {
        $result = $this->db->where('id_brg',$id)
                           ->limit(1)
                           ->get('pricing') ;
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
    // public function video_graph($role_id = null){
    //     $this->db->select('user.id, user.name, pricing.proses AS batas_pengerjaan');
    //     $this->db->from('user');
    //     $this->db->join('tb_pesanan', 'tb_pesanan.id_videographer = user.id', 'left');   
    //     $this->db->join('pricing', 'pricing.id_brg = tb_pesanan.id_brg', 'left');
    //     $this->db->group_by('user.id');
    //     return $this->db->get();
    // }
    public function video_graph($role_id = null){
        $query = $this->db->query("SELECT user.id, user.name, tb_invoice.tanggal_pesanan AS tanggal_pesanan, DATE_ADD(tb_invoice.tanggal_pesanan, INTERVAL pricing.proses DAY) AS batas_pengerjaan FROM user LEFT JOIN tb_pesanan ON tb_pesanan.id_videographer = user.id LEFT JOIN pricing ON pricing.id_brg = tb_pesanan.id_brg LEFT JOIN tb_invoice ON tb_invoice.id = tb_pesanan.id_invoice WHERE user.role_id = '2' GROUP BY user.id");
        return $query;
    }
    
    public function tampilkan_video_graph(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.role_id = 2');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
}