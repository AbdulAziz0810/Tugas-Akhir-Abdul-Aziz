<?php

class Upload_video extends CI_Model
{
    public function tampilkan_video($id_user = null)
    {
        if ($id_user == null) {
            return $this->db->get('galery');
        } else {
            return $this->db->get_where('galery', ['id_user' => $id_user]);
        }
    }

    public function tambah_video($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function dtl_video($id_video)
    {
        $result = $this->db->where('id_video', $id_video)->get('galery');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tampil_user()
    {
        return $this->db->get('user');
    }
    public function edit_menajemen($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function hapus_video($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function komentar($id_video)
    {
        $this->db->select('*');
        $this->db->from('komentar');
        $this->db->where('id_video', $id_video);
        return $this->db->get()->result();
    }
}
