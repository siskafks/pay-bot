<?php

class LaporanGaji extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
			redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Laporan Gaji Pegawai";

        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        
        $data['jabatan'] = $this->PayBotModel->getData('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporanGaji');
        $this->load->view('templates_admin/footer');
    }

    public function cetakGaji()
    {
        $data['title'] = "Cetak Laporan Gaji Pegawai";

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan.$tahun;

        $data['cetakGaji'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, 
        data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, 
        data_jabatan.target_servis, data_servis.biaya_servis
        FROM data_pegawai
        INNER JOIN data_servis ON data_servis.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
        WHERE data_servis.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();
        
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakGaji',$data);
      
    }
}

?>