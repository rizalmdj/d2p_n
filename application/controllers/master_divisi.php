<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_divisi extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('admin_valid') != true){
			redirect(base_url("index.php/admin/login"));
		}elseif($this->session->userdata('admin_level')!= '1'){
			redirect(base_url("index.php/admin/login"));
		}
		$this->load->model(array('web_model','m_divisi_model'));
	}

//	VIEW MASTER DIVISI

	public function master_data_divisi (){
		$data['page']		= "l_divisi";
		$data['divisi'] = $this->m_divisi_model->getAllDivisi();

		if (!empty($this ->input->post('q'))){

			$data['divisi'] = $this->m_divisi_model->searchMasterDivisi();
		}

		$this->load->view('admin/aaa', $data);
	}

//	ADD MASTER DIVISI

	public function add_master_divisi (){
		$data['page']		= "f_divisi";	
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_master_divisi () {

		$this->form_validation->set_rules('nama_divisi','nama_divisi','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/master_divisi/add_master_divisi');

		 }else {
		 	$this->m_divisi_model->add_master_divisi();
		 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
		 	redirect('index.php/master_divisi/master_data_divisi');
		 }
}

 // EDIT MATER DIVISI


	public function edit_divisi($id_divisi){
		// $id_divisi 			= $this->uri->segment(3);
		$data['page']		="f_edit_divisi";
		$data['divisi']	= $this->m_divisi_model->getDivisi($id_divisi);
		$this->load->view('admin/aaa', $data);

	}

	public function do_edit_divisi (){

		$this->form_validation->set_rules('nama_divisi','nama_divisi', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/master_divisi/edit_divisi');

		 }else {
		 	$this->m_divisi_model->edit_divisi();
		 	redirect('index.php/master_divisi/master_data_divisi');
		 }

	}
// DELETE

	public function hapus_divisi($id_divisi){
		$this->m_divisi_model->delete_divisi($id_divisi,'tb_divisi');
		redirect('index.php/master_divisi/master_data_divisi');

	}
	
}