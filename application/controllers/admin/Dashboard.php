<?php

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
			redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $servis = $this->db->query("SELECT * FROM data_servis");
        $data['pegawai'] = $pegawai->num_rows();
        $data['jabatan'] = $jabatan->num_rows();
        $data['servis'] = $servis->num_rows();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}

?>