<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_data extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('admin_valid') != true){
			redirect(base_url("index.php/admin/login"));
		}elseif($this->session->userdata('admin_level')!= '1'){
			redirect(base_url("index.php/admin/login"));
		}
		$this->load->model(array('web_model','departemen_model'));
	}


//	VIEW DEPARTEMENT

	public function master_data_departemen (){
		$data['page']		= "l_departemen";	
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();

		if (!empty($this ->input->post('q'))){

			$data['departemen'] = $this->departemen_model->searchMasterDepartement();
		}


		$this->load->view('admin/aaa', $data);
	}


//	ADD DEPARTEMENT

	public function add_departemen (){
		$data['page']		= "f_departemen";
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();
		$data['divisi'] 	= $this->web_model->getAll('tb_divisi');
		$this->load->view('admin/aaa', $data);
	}	

	public function do_add_departemen (){

		$this->form_validation->set_rules('nama_departemen','nama_departemen', 'trim|required');
		$this->form_validation->set_rules('nama_divisi','nama_divisi', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/master_data/add_departemen');

		 }else {
		 	$this->departemen_model->addDepartemen();
		 	redirect('index.php/master_data/master_data_departemen');
		 }
	}


//	EDIT DEPARTEMENT

	public function edit_departemen($id_dep){
		$data['page']		="f_edit_departemen";
		$data['departemen']	= $this->departemen_model->getDepDivisi($id_dep);
		$this->load->view('admin/aaa', $data);
		// var_dump($data['departemen']);die;
	}

	public function do_update_departemen (){

		$this->form_validation->set_rules('nama_departemen','nama_departemen', 'trim|required');


		$id_dep = $this->input->post('id_dep');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/master_data/edit_departemen');

		 }else {

		 	$data = $this->input->post();
		 	$this->departemen_model->updateDepartemen($id_dep, $data);

		 	redirect('index.php/master_data/master_data_departemen');
		 }
	}


//	DELETE DEPARTEMENT

	public function hapus_departemen($id_dep){
		$this->departemen_model->delete_departemen($id_dep,'tb_departemen');
		redirect('index.php/master_data/master_data_departemen');
	}


}