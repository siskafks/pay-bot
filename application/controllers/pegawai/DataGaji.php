<?php

class DataGaji extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '2'){
			redirect('welcome');
        }
    }

    public function index()
    {   
        $data['title'] = "Data Gaji";
        $nik=$this->session->userdata('nik');
        $data['gaji'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, 
        data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_jabatan.target_servis,
        data_servis.biaya_servis, data_servis.bulan, data_servis.id_servis
        FROM data_pegawai
        INNER JOIN data_servis ON data_servis.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
        WHERE data_servis.nik='$nik'
        ORDER BY data_servis.bulan DESC")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dataGaji',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function cetakSlip($id)
    {
        $data['title'] = "Cetak Slip Gaji";

        $data['cetak_slip'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, 
        data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, 
        data_jabatan.target_servis, data_servis.biaya_servis, data_servis.bulan
        FROM data_pegawai
        INNER JOIN data_servis ON data_servis.nik = data_pegawai.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_pegawai.jabatan
        WHERE data_servis.id_servis='$id'")->result();

        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('pegawai/cetakSlipGaji',$data);
    }
}

?>