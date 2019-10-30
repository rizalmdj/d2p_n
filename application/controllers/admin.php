<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('web_model');
	}
	
	public function index() {
		if ($this->session->userdata('admin_valid') == FALSE && $this->session->userdata('admin_id') == "") {
			redirect("index.php/admin/login");
		}

		 if ($this->session->userdata('status_pas') == '0'){
		 	$page['page']	= "f_edit_pas";
            $this->load->view('admin/f_edit_pass');
		 }else{
		 	$a['page']	= "d_amain";
		
			$this->load->view('admin/aaa', $a);
		}
	}									
	
	//login
	public function login() {
		$this->load->view('admin/login');
	}
	
	public function do_login() {
		$u 		= $this->security->xss_clean($this->input->post('u'));
		$ta 	= $this->security->xss_clean($this->input->post('ta'));
        $p 		= md5($this->security->xss_clean($this->input->post('p')));
         
		$q_cek	= $this->db->query("SELECT * FROM t_admin WHERE username = '".$u."' AND password = '".$p."'");
		$j_cek	= $q_cek->num_rows();
		$d_cek	= $q_cek->row();
		//echo $this->db->last_query();
		
        if($j_cek == 1) {
            $data = array(
                    'id' => $d_cek->id,
                    'user' => $d_cek->username,
                    'nama' => $d_cek->nama,
                    'nip'  => $d_cek->nip,
                    'admin_ta' => $ta,
                    'admin_level' => $d_cek->id_role_access,
                    'divisi' => $d_cek->id_divisi,
                    'departemen' => $d_cek->id_dep,
					'admin_valid' => true,
					'status_pas' => $d_cek->status_pas
                    );
            //print_r(json_encode($data));
            //echo $d_cek->status_pas;

           
            	$this->session->set_userdata($data);
            	redirect('index.php/admin');
            
           


        } else {	
			$this->session->set_flashdata("k", "<div id=\"alert\" class=\"alert alert-error\">username or password is not valid</div>");
			redirect('index.php/admin/login');
		}
	}
	
	public function logout(){
        $this->session->sess_destroy();
		redirect('index.php/admin/login');
    }


}
