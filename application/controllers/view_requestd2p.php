<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_requestd2p extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('admin_valid') != true){
			redirect(base_url("index.php/admin/login"));
		}
		$this->load->model(array('web_model','view_requestd2p_model'));
	}


// VIEW LIST REQUEST D2P

	public function view_requestd2p_list (){
		$data['page']		= "l_view_requestd2p";	
		$data['view_request'] = $this->view_requestd2p_model->getAllViewRequest();
		// print_r($data['view_request']);
		// die();

		if (!empty($this->input->post('q'))){
			$data['view_request'] =  $this->view_requestd2p_model->searchViewRequest();
		}

		
		$this->load->view('admin/aaa', $data);

	}

// APPROVAL LIST REQUEST D2P

	public function approval_request_d2p($id,$id_role){

		// print_r($id.'-'.$id_role); die();
		if($id_role == '3'){
			$status = '4';
		}elseif($id_role == '4'){
			$status = '5';
		}
		$this->view_requestd2p_model->approval_request_d2p($id,$status);
		redirect('index.php/view_requestd2p/view_requestd2p_list');	
	}

// REJECT LIST REQUEST D2P

	public function reject_request_d2p($id,$id_role){
		$this->view_requestd2p_model->reject_request_d2p($id,$id_role);
		redirect('index.php/view_requestd2p/view_requestd2p_list');
	}

}