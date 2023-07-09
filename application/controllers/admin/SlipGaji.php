<?php

class SlipGaji extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
			redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Slip Gaji Pegawai";
        $data['pegawai'] = $this->PayBotModel->getData('data_pegawai')->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/slipGaji',$data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakSlipGaji()
    {
        $data['title'] = "Cetak Slip Gaji";
        $nama = $this->input->post('nama_pegawai');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $bulantahun = $bulan.$tahun;

        $data['cetak_slip'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, 
        data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, 
        data_jabatan.target_servis, data_servis.biaya_servis, data_servis.bulan
        FROM data_pegawai
        INNER JOIN data_servis ON data_servis.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
        WHERE data_servis.bulan='$bulantahun' AND data_servis.nama_pegawai='$nama'")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakSlipGaji',$data);
    }
}

?>