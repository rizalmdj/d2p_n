<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_data_user extends CI_Controller {
	function __construct() {
		parent::__construct();
		if($this->session->userdata('admin_valid') != true){
			redirect(base_url("index.php/admin/login"));
		}
		$this->load->model(array('web_model','m_user_model','departemen_model','role_access_model','m_divisi_model'));
	}


// 	VIEW MASTER USER 

	public function master_user (){
		$data['page']		= "l_master_user";	
		$data['datauser'] = $this->m_user_model->getAlluser();

		if (!empty($this ->input->post('q'))){

			$data['datauser'] = $this->m_user_model->searchMasterDataUser();
		}

		$this->load->view('admin/aaa', $data); 
	}


// 	ADD MASTER USER

	public function add_master_user (){
		$data['page']		= "f_master_user";	
		$data['role_access'] = $this->role_access_model->getAllRoleAccess();
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();
		$data['divisi'] 	= $this->web_model->getAll('tb_divisi');
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_master_user (){

			$this->form_validation->set_rules('username','username', 'trim|required');
			$this->form_validation->set_rules('password','password', 'trim|required');
			$this->form_validation->set_rules('name','name', 'trim|required');
			$this->form_validation->set_rules('id_karyawan','id_karyawan', 'trim|required');
			$this->form_validation->set_rules('email','email', 'trim|required');
			$this->form_validation->set_rules('role_access','role_access', 'trim|required');
			$this->form_validation->set_rules('nama_divisi','nama_divisi', 'trim|required');
			$this->form_validation->set_rules('nama_departemen','nama_departemen', 'trim|required');
			$this->form_validation->set_rules('status','status', 'trim|required');
			
			$eksekusi = $this->m_user_model->add_master_user_model();

			if($eksekusi==true){
				$data['page']		= "l_master_user";	
				$data['datauser'] = $this->m_user_model->getAlluser();

				if (!empty($this ->input->post('q'))){

					$data['datauser'] = $this->m_user_model->searchMasterDataUser();
				}				
				$this->load->view('admin/aaa', $data);
			}
	}

// 	GET DEPARTEMENT

	public function get_dept (){
			
			$search = $this->m_user_model->findDept($_POST['div']);
			
			if ($search) {
				$result['status']= true;
				$result['message'] = 'sukses';
				$result['data'] = $search;
			}
			else{
				$result['status']= false;
				$result['message'] = 'gagal mengambil data';
			}
			echo json_encode($result);
		}


//	EDIT MASTER USER

	public function edit_master_user (){
		$data['page']		= "f_master_user_edit";	
		$data['role_access'] = $this->role_access_model->getAllRoleAccess();
		$data['departemen'] = $this->departemen_model->getAllDepDivisi();
		$data['divisi'] 	= $this->web_model->getAll('tb_divisi');
		$this->load->view('admin/aaa', $data);
	}

// NEW PASS 

	public function new_pass(){

		$id					= $this->session->userdata('user');
		$status_pas			= '1';
		$new_pass			= $this->input->post('confirm_password');
		$this->m_user_model->new_pass($id,$status_pas);
		$a['page']	= "d_amain";
		
		$this->load->view('admin/aaa', $a);


		echo $id ;
	}

// RESET PASS

	public function reset_pass(){
		$id					= $this->uri->segment(3);
		$this->m_user_model->reset_pass($id);

		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Password has been reset</div>");
		redirect('index.php/m_data_user/master_user');
	}


// DELET USER

	public function delete_master_user ($id){
		$this->m_user_model->delet_user($id);
		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">User has been deleted</div>");
		redirect('index.php/m_data_user/master_user');
	}

}