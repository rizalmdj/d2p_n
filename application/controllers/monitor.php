<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitor extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model(array('Monitor_model','Requestd2p_model'));
	}

//	VIEW MASTER DIVISI

	public function index (){
		$data['page']		= "Monitor";
		$data['data']=$this->Monitor_model->data();
		$data['data2']=$this->Monitor_model->submitted();
		//print_r($data);
		$this->load->view('admin/aaa', $data);
	}
//View Request

	public function view_request_status ($stat1, $stat2){
		$data['page']		= "l_view_requestd2p";	
		$data['view_request'] = $this->Requestd2p_model->getAllRequestbyStatus($stat1,$stat2);	
		// print_r($data['view_request']);
		// die();

		if (!empty($this->input->post('q'))){
			$data['view_request'] =  $this->view_requestd2p_model->searchViewRequest();
		}

		
		$this->load->view('admin/aaa', $data);
	}
	
}