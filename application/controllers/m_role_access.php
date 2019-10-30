<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_role_access extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('admin_valid') != true){
			redirect(base_url("index.php/admin/login"));
		}elseif($this->session->userdata('admin_level')!= '1'){
			redirect(base_url("index.php/admin/login"));
		}
		$this->load->model(array('web_model','role_access_model'));
	}


//	VIEW ROLE ACCESS

	public function master_role_access (){
		$data['page']		= "l_role_access";	
		$data['role_access'] = $this->role_access_model->getAllRoleAccess();

		if (!empty($this ->input->post('q'))){

			$data['role_access'] = $this->role_access_model->searchRoleAccess();
		}

		$this->load->view('admin/aaa', $data);
	}

//	ADD ROLE ACCESS

	public function add_role_access (){
		$data['page']		= "f_role_access";	
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_role_access () {

		$this->form_validation->set_rules('role_access','role_access','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/m_role_access/add_role_access');

		 }else {
		 	$this->role_access_model->add_role_access();
		 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
		 	redirect('index.php/m_role_access/master_role_access');
		 }
	}


//	EDIT ROLE ACCESS

	public function edit_role_access(){
		$id 				= $this->uri->segment(3);
		$data['data'] 		= $this->role_access_model->getEditRoleAccessById($id);
		$data['page']		="f_role_access_edit";
		// print_r($data['data']);exit;	
		$data['role_access']= $this->role_access_model->getAllEditRoleAccess();
		$this->load->view('admin/aaa', $data);

	}

	public function do_edit_role_access () {

		$this->form_validation->set_rules('role_access','role_access','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/m_role_access/edit_role_access');

		 }else {
		 	$this->role_access_model->edit_role_acess();
		 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been edited</div>");
		 	redirect('index.php/m_role_access/master_role_access');
		 }
	}


// DELETE ROLE ACCESS

	public function delete_role_access ($id_role_access){
		$this->role_access_model->delete_role_access($id_role_access,'tb_role_access');
		redirect('index.php/m_role_access/master_role_access');
	} 

}