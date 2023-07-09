<?php

class LaporanServis extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
			redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Laporan Servis";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporanServis');
        $this->load->view('templates_admin/footer');
    }

    public function cetakServis()
    {
        $data['title'] = "Cetak Laporan Servis";
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan.$tahun;
        $data['lap_servis'] =  $this->db->query("SELECT * FROM data_servis 
        WHERE bulan='$bulantahun'
        ORDER BY nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakServis');
    }
}
?>