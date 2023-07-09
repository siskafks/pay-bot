<?php

class DataServis extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
			redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Data Servis Pegawai";
     
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['servis'] = $this->db->query("SELECT data_servis.*, data_pegawai.nama_pegawai, data_pegawai.jabatan
        FROM data_servis
        INNER JOIN data_pegawai ON data_servis.nik=data_pegawai.nik
        INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.nama_jabatan
        WHERE data_servis.bulan='$bulantahun'
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataServis',$data);
        $this->load->view('templates_admin/footer');
    }

    public function inputServis()
    {
        if($this->input->post('submit', TRUE) == 'submit'){

            $post = $this->input->post();

            foreach($post['bulan'] as $key => $value){
                if($post['bulan'][$key] !='' || ['nik'][$key] != '')
                {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'nama_pegawai' => $post['nama_pegawai'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'biaya_servis' => $post['biaya_servis'][$key],
                    );
                }
            }

            $this->PayBotModel->insert_batch('data_servis',$simpan);
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>Data berhasil ditambahkan!
          </div>');
            redirect('admin/dataServis');
        }

        $data['title'] = "Form Input Servis Pegawai";

        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }

        $data['inputServis'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
        INNER JOIN data_jabatan ON data_pegawai.jabatan=data_jabatan.nama_jabatan
        WHERE NOT EXISTS (SELECT * FROM data_servis WHERE bulan='$bulantahun'AND data_pegawai.nik=data_servis.nik ) 
        ORDER BY data_pegawai.nama_pegawai ASC")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/inputServis',$data);
        $this->load->view('templates_admin/footer');
    }
}
?>