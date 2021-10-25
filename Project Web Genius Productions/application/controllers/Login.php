<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function masuk()
    {
        if ($this->session->userdata('email')){
            redirect('user');
        }
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        if ($this->form_validation->run() == false) {
            $data['judul']  = "Halaman masuk ";
            $this->load->view('pengunjung/Tempalte/header', $data);
            $this->load->view('pengunjung/masuk');
            $this->load->view('pengunjung/Tempalte/footer');

        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();
       
        if($this){
            // user aktif
            if($user['is_active'] == 1) {
                    //cek password
                    if(password_verify($password, $user['password'])){
                        $data = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        if($user['role_id']==2){
                            redirect('Videographer/penjual');
                        } elseif($user['role_id']==3) {
                            $data = [
                                'id' => $user['id'],
                                'email' => $user['email'],
                                'role_id' => $user['role_id']
                            ];
                            $this->session->set_userdata($data);
                            redirect('home');
                        
                    }else {
                            redirect('home');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah</div>');
                        redirect('Login/masuk');
                    }

                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email tidak aktif </div>');
                    redirect('Login/masuk');
                }
            

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email tidak terdaftar </div>');
            redirect('Login/masuk');
        }

    }


    public function registrasi()
    {
        $this->form_validation->set_rules('name', 'Name','required|trim');
        $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password','required|trim|min_length[6]|matches[password2]',['matches' => 'password tidak sama!','min_length' => 'password terlalu pendek!']);
        $this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['judul']  = "Halaman registrasi ";
            $this->load->view('pengunjung/Tempalte/header', $data);
            $this->load->view('pengunjung/registrasi');
            $this->load->view('pengunjung/Tempalte/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT), 
                'role_id' => 3,
                'is_active' => 1,
                'date_daftar' => time()
            ];

            $this->db->insert('user', $data);

            // $this->_sendEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> selamat anda berhasil mendaftar! Silahkan Login </div>');
            redirect('Login/masuk');
        }
    }
    public function registrasi_videographer()
    {
        $this->form_validation->set_rules('name', 'Name','required|trim');
        $this->form_validation->set_rules('email', 'Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' => 'email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password','required|trim|min_length[6]|matches[password2]',['matches' => 'password tidak sama!','min_length' => 'password terlalu pendek!']);
        $this->form_validation->set_rules('password2', 'Password','required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['judul']  = "Halaman registrasi ";
            $this->load->view('pengunjung/Tempalte/header', $data);
            $this->load->view('pengunjung/registrasi_v');
            $this->load->view('pengunjung/Tempalte/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT), 
                'role_id' => 2,
                'is_active' => 1,
                'date_daftar' => time()
            ];

            $this->db->insert('user', $data);

            // $this->_sendEmail();

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> selamat anda berhasil mendaftar! Silahkan Login </div>');
            redirect('Login/masuk');
        }
    }


    // private function _sendEmail()
    // {
    //     $config = [
    //      'protocol'  => 'smpt',
    //        'smtp_host' => 'ssl://smpt.googlemail.com',
    //        'smtp_user' => 'manjiw0909@gmail.com',
    //        'smtp_pass' => 'Thisfx123',
    //        'smtp_port' =>  465,
    //        'mailtype'  => 'html',
    //        'charset'   => 'utf-8',
    //        'newline'   => "\r\n"
    //     ];

    //    $this->load->library('email', $config);
    //    $this->email->initialize($config);
    //    $this->email->from('manjiw0909@gmail.com','man jiw');
    //    $this->email->to('hidayatsteven09@gmail.com');
    //    $this->email->subject('testing');
    //    $this->email->message('hello world');

    //    if( $this->email->send()) {
    //        return true;
    //    } else {
    //        echo $this->email->print_debugger();
    //        die;
    //    }
    // }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> anda telah keluar</div>');
            redirect('Login/masuk');
    }

    public function blocked()
    {
        echo 'akses dilarang!';
    }
}