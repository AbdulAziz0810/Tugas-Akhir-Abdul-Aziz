<?php
class Model_invoice extends CI_Model{
    public function index()
    {
        // get data tb invoice
        // munculkan data berdasarkan tanggal batas dimana tanggal hari ini sama atau melebihi tanggal batas
        $nama = $this->input->post('nama');
        $id_pemesan = $this->session->userdata('id');
        $videographer = $this->input->post('videographer');
        $nomor_hp   =$this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $this->form_validation->set_rules('nama_pemesanan', 'Name','required|trim');
        $tanggalCreate = date_create($tanggal);
        $tanggalBatas = date_add($tanggalCreate, date_interval_create_from_date_string('1 days'));
        $formatTanggalBatas = date_format($tanggalBatas, 'Y-m-d');


            $invoice = array (
            'nama_pemesan'          =>$nama,
            'id_pemesan'            =>$id_pemesan,
            'id_videographer'       =>$videographer,
            'no_tlpn'               =>$nomor_hp,
            'tanggal_pesanan'       => $tanggal,
            'jam_pemesanan'         => $jam,
            'batas_pembayaran'      => $formatTanggalBatas,
            'alamat_pemesan'        => $alamat,
            'status'                => 'belum_bayar'

            );
            $this->db->insert('tb_invoice',$invoice);
            $id_invoice = $this->db->insert_id();
            $videographer = $this->input->post('videographer');

            foreach ($this->cart->contents() as $item){
                $data = array(
                    'id_invoice'      =>$id_invoice,
                    'id_brg'          =>$item['id'],
                    'kategori_brg'    =>$item['name'],
                    'harga'           =>$item['price'],
                    'id_videographer'    =>$videographer,
                    
                
                );
                $this->db->insert('tb_pesanan', $data);
            } 

        return TRUE;

    }
    
    public function tampil_data()
    {  
        $idUser = $_SESSION['id'];

        $this->db->where('id', $idUser);
        $user = $this->db->get('user')->row();
        
        if($user->role_id == '1'){
            $this->db->select('tb_invoice.*, user.name');
            $this->db->from('user');
            $this->db->join('tb_invoice', 'tb_invoice.id_videographer = user.id');
            $invoice = $this->db->get()->result();
        } else {
            $this->db->select('tb_invoice.*, user.name');
            $this->db->from('user');
            $this->db->where('id_videographer', $idUser);
            $this->db->join('tb_invoice', 'tb_invoice.id_videographer = user.id');
            $invoice = $this->db->get()->result();
        }

        return $invoice;
    }

    public function ambil_id_invoice($id_invoice)
    {
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    } 
    
    public function ambil_id_pesanan($id_invoice)
    {
        $this->db->select('tb_pesanan.*, user.name');
        $this->db->from('user');
        $this->db->join('tb_pesanan', 'tb_pesanan.id_videographer = user.id');
        $this->db->where('tb_pesanan.id_invoice', $id_invoice);
        return $this->db->get()->result();
    } 

    public function belum_bayar1(){
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->join('tb_invoice', 'tb_invoice.id = tb_pesanan.id_invoice');
        $this->db->join('user', 'user.id = tb_invoice.id');
        $this->db->join('pricing', 'pricing.id_brg = tb_pesanan.id_brg');
        $this->db->where('user.id', $this->session->userdata('user.id'));
        $this->db->order_by('tb_pesanan.id', 'desc');
        return $this->db->get()->result();
    }

    public function belum_bayar()
    {
        $idUser = $_SESSION['id'];

        $this->db->where('id', $idUser);
        $user = $this->db->get('user')->row();
        
        if($user->role_id == '1'){
            // Akun admin
            $this->db->select('tb_invoice.*, user.name');
            $this->db->from('user');
            $this->db->join('tb_invoice', 'tb_invoice.id_pemesan = user.id');
            $invoice_bayar = $this->db->get()->result();
        } else if($user->role_id == '2') {
            // Akun videographer
            $this->db->select('tb_invoice.*, user.name');
            $this->db->from('user');
            $this->db->where('tb_invoice.id_videographer', $idUser);
            $this->db->join('tb_invoice', 'tb_invoice.id_pemesan = user.id');
            $invoice_bayar = $this->db->get()->result();
        } else if($user->role_id == '3') {
             // Akun member
             $this->db->select('tb_invoice.*, user.name');
             $this->db->from('user');
             $this->db->where('tb_invoice.id_pemesan', $idUser);
             $this->db->join('tb_invoice', 'tb_invoice.id_videographer = user.id');
            //  $this->db->join('tb_pesanan','tb_invoice.id = tb_invoice.id');
            // var_dump( $this->db->get()->result()); exit;
             $invoice_bayar = $this->db->get()->result();
        }

        return $invoice_bayar;
    }
   public function detail_bayar($id_invoice)
   {
       $this->db->select('*');
       $this->db->from('tb_pesanan');
       $this->db->where('id_invoice', $id_invoice);
       return $this->db->get()->row();
   }

 

   public function tampil_vidio($id) {
     $this->db->select('*');
     $this->db->from('tb_invoice');
     $this->db->where('id' , $id);
     return $this->db->get()->row_array();
       
   }

   public function ambilid($id)
   {
       $result = $this->db->where('id', $id)->limit(1)->get('tb_invoice');
       if($result->num_rows() > 0){
           return $result->row();
       }else{
           return false;
       }
   } 
   
   public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function tolak($data) {
            $this->db->where('id' , $data['id']);
            $this->db->update('tb_invoice' ,$data);
    }


    public function buktiBayar() {
        $this->db->select('*');
        $this->db->from('tb_invoice');
        $this->db->where('status ="bayar"');
        $this->db->order_by('id','desc');
        return $this->db->get()->result();
    }

    public function selesai($data) {
        $this->db->where('id' , $data['id']);
        $this->db->update('tb_invoice' ,$data);
    }

    public function jumlah() {
        return $this->db->get('tb_invoice')->num_rows();
      
    }
    public function jumlah1() {
       
        return $this->db->get('user')->num_rows();
    }
    public function jumlah2() {
       
        return $this->db->get('galery')->num_rows();
    }
    public function jumlah3() {
       
        return $this->db->get('pricing')->num_rows();
    }
    public function jumlah4() {
       
        return $this->db->get('komentar')->num_rows();
    }
  
}