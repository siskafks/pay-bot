<?php

class DataJabatan extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses') != '1'){
			redirect('welcome');
        }
    }
    
    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->PayBotModel->getData('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function addData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->addData();
        }else{
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');
            $target_servis = $this->input->post('target_servis');

            $data = array(
                'nama_jabatan' => $nama_jabatan, 
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
                'target_servis' => $target_servis,
            );

            $this->PayBotModel->insertData($data,'data_jabatan');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>Data berhasil ditambahkan!
            </div>');
            redirect('admin/dataJabatan');
        }
    }
  
    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $tj_transport = $this->input->post('tj_transport');
            $uang_makan = $this->input->post('uang_makan');
            $target_servis = $this->input->post('target_servis');

            $data = array(
                'nama_jabatan' => $nama_jabatan, 
                'gaji_pokok' => $gaji_pokok,
                'tj_transport' => $tj_transport,
                'uang_makan' => $uang_makan,
                'target_servis' => $target_servis,
            );

            $where = array(
                'id_jabatan' => $id
            );

            $this->PayBotModel->updateData('data_jabatan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>Data berhasil diupdate!
            </div>');
            redirect('admin/dataJabatan');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
        $this->form_validation->set_rules('tj_transport','tunjangan transport','required');
        $this->form_validation->set_rules('uang_makan','uang makan','required');
        $this->form_validation->set_rules('target_servis','target servis','required');
    }

    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->PayBotModel->deleteData($where,'data_jabatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-check"></i>Data berhasil dihapus!
          </div>');
        redirect('admin/dataJabatan');
    }
}

?>