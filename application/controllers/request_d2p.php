<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Request_d2p extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek session untuk validasi login 
		if($this->session->userdata('admin_valid') != true){
			redirect(base_url("index.php/admin/login"));
		}

		$this->load->model(array('web_model','requestd2p_model','view_requestd2p_model'));
		$this->load->library('session');
		$this->load->helper('url');

	} 

// VIEW ALL USER LIST REQUEST D2P

	public function request_d2p_list (){
		$data['page']		= "l_request_d2p";	
		$data['request'] = $this->requestd2p_model->getAllRequest();				

		if (!empty($this ->input->post('a'))){

			$data['request'] = $this->requestd2p_model->searchRequestd2p();
		}

		$this->load->view('admin/aaa', $data);
	}

// VIE LIST LIST REQUEST D2P --------------
	public function request_d2p_user_list (){
		$var = $this->session->userdata;
		$id = $var['nama'];
		$data['page']		= "l_request_d2p";	
		$data['request'] = $this->requestd2p_model->getUserRequest($id);				

		if (!empty($this ->input->post('a'))){

			$data['request'] = $this->requestd2p_model->searchRequestd2p();
		}

		$this->load->view('admin/aaa', $data);
	}

// ADD REQUEST D2P

	public function add_request_d2p (){
		$data['page']		= "f_requestd2p";	
		$this->load->view('admin/aaa', $data);
	}

	public function do_add_requestd2p () {

		//$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('project_name','project_name','trim|required');
		$this->form_validation->set_rules('project_id','project_id','trim|required');
		$this->form_validation->set_rules('project_manager','project_manager','trim|required');
		$this->form_validation->set_rules('req_date','req_date','trim|required');
		$this->form_validation->set_rules('git','git','trim|required');
		// $this->form_validation->set_rules('upload_file','upload_file','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/request_d2p/add_request_d2p');

		 }else {
				
			$config['upload_path']          = './upload/';
            $config['allowed_types']        = 'xlsx|docx|jpg|png|pdf|jpeg|JPG|';
            //$config['encrypt_name']         = TRUE;                
			$this->load->library('upload', $config);
			$j = 0;
				if($this->upload->do_upload('upload_file1')){
					$j++;
					
					$data = array('upload_data1' => $this->upload->data());
					$file1 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file2')){
					$j++;	
					$data = array('upload_data2' => $this->upload->data());
					$file2 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file3')){
					$j++;	
					$data = array('upload_data3' => $this->upload->data());
					$file3 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file4')){
					$j++;	
					$data = array('upload_data4' => $this->upload->data());
					$file4 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file5')){
					$j++;	
					$data = array('upload_data5' => $this->upload->data());
					$file5 = $this->upload->data('file_name')['file_name'];
				} 
				if($this->upload->do_upload('upload_file6')){
					$j++;	
					$data = array('upload_data6' => $this->upload->data());
					$file6 = $this->upload->data('file_name')['file_name'];
				}

                if ( $j < 6)
                {
                          $error = array('error' => $this->upload->display_errors());
                          print_r ( $error); 
                       // $this->load->view('f_requestd2p', $error);
                }
                else
                {
                        //$data = array('upload_data' => $this->upload->data());						
                        $this->requestd2p_model->add_request($file1,$file2,$file3,$file4,$file5,$file6);
		 				$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been added</div>");
		 				redirect('index.php/request_d2p/request_d2p_user_list');
				}	
				//print_r($data);		
				
		 }
	}

// EDIT REQUEST D2P

	public function edit_request_d2p (){
		$id					= $this->uri->segment(3);
		$data['data'] = $this->requestd2p_model->getEditRequestById($id);
		$data['page']		= "f_requestd2p_edit";
		// print_r($data['data']);exit;	
		$data['request'] = $this->requestd2p_model->getAllEditRequest();
		$this->load->view('admin/aaa', $data);
	}

	public function detail_request_d2p (){
		$id					= $this->uri->segment(3);
		$data['data'] = $this->requestd2p_model->getDetailRequestById($id);
		$data['coment']= $this->requestd2p_model->getComent($id);
		$data['page']		= "f_requestd2p_view";
		//echo "<pre>"; print_r($data['data']); echo "</pre>";exit;	
		$data['request'] = $this->requestd2p_model->getAllEditRequest();
		$this->load->view('admin/aaa', $data);
	}

	public function do_edit_requestd2p () {

		//$this->form_validation->set_rules('name','name','trim|required');
		$this->form_validation->set_rules('project_name','project_name','trim|required');
		$this->form_validation->set_rules('project_id','project_id','trim|required');
		$this->form_validation->set_rules('project_manager','project_manager','trim|required');
		$this->form_validation->set_rules('req_date','req_date','trim|required');
		// $this->form_validation->set_rules('upload_file','upload_file','trim|required');

		if ($this->form_validation->run() == FALSE) {
			redirect('index.php/request_d2p/request_d2p_user_list');

			}else {

				if(isset($_POST['edit_data']))
			    {
			    	$config['upload_path']          = './upload/';
		            $config['allowed_types']        = 'xlsx|docx|jpg|png|pdf|jpeg|JPG|';
		            $config['encrypt_name']         = TRUE;                
					$this->load->library('upload', $config);
					$j = 0;
						if($this->upload->do_upload('upload_file1')){
							$j++;
							
							$data = array('upload_data1' => $this->upload->data());
							$file1 = $this->upload->data(new_name)['file_name'];
						} 
						if($this->upload->do_upload('upload_file2')){
							$j++;	
							$data = array('upload_data2' => $this->upload->data());
							$file2 = $this->upload->data('file_name')['file_name'];
						} 
						if($this->upload->do_upload('upload_file3')){
							$j++;	
							$data = array('upload_data3' => $this->upload->data());
							$file3 = $this->upload->data('file_name')['file_name'];
						} 
						if($this->upload->do_upload('upload_file4')){
							$j++;	
							$data = array('upload_data4' => $this->upload->data());
							$file4 = $this->upload->data('file_name')['file_name'];
						} 
						if($this->upload->do_upload('upload_file5')){
							$j++;	
							$data = array('upload_data5' => $this->upload->data());
							$file5 = $this->upload->data('file_name')['file_name'];
						} 
						if($this->upload->do_upload('upload_file6')){
							$j++;	
							$data = array('upload_data6' => $this->upload->data());
							$file6 = $this->upload->data('file_name')['file_name'];
						}

		                if ( $j < 6)
		                {
		                        $error = array('error' => $this->upload->display_errors());

		                        $this->load->view('upload_form', $error);
		                }else{
		                	$this->requestd2p_model->edit_request_data($file1,$file2,$file3,$file4,$file5,$file6);	
		                }        
			    }         
			 	$this->requestd2p_model->edit_request();
			 	$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been edited</div>");
			 	redirect('index.php/request_d2p/request_d2p_user_list'); 
			}
	}

// DELETE REQUEST D2P

	public function delete_request_d2p($id){
		$this->requestd2p_model->delete_request_d2p($id,'tr_request');
		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been deleted</div>");
		redirect('index.php/request_d2p/request_d2p_user_list');
	}

// SUBMIT REQUEST D2P 

	public function submit_request_d2p($id){
		$this->requestd2p_model->submit_request_d2p($id);
		//$this->email_Send($id);
		$this->session->set_flashdata("k", "<div class=\"alert alert-success\" id=\"alert\">Data has been submited</div>");
		redirect('index.php/request_d2p/request_d2p_user_list');
	}


//View Request

	public function view_request_d2p_user (){
		$id					= $this->uri->segment(3);
		$data['data'] = $this->view_requestd2p_model->getViewRequestUserById($id);
		$data['page']		= "f_requestd2p_view";
		// print_r($data['data']);exit;	
		$data['request'] = $this->view_requestd2p_model->getAllViewRequestUser();
		$this->load->view('admin/aaa', $data);
	}

// send coment
	public function send_coment (){
		$rid					= $this->input->post('id',true);
		$uid  					= $this->session->userdata('id');
		$id_role				= $this->session->userdata('admin_level');
		$url 					='index.php/request_d2p/detail_request_d2p/';
		$data = array(
						 "id_tr_request" => $this->input->post('id',true),
						  "id_t_admin" => $uid,
						   "date" => date("Y-m-d H:i:s"),
						    "conten" => $this->input->post('Coment',true)
		);

		
	    if (isset($_POST['approv'])) {

	    	if($id_role == '3'){
			$status = '4';
			
			
			
			}elseif($id_role == '4'){
				$status = '5';
				
			}
			$this->view_requestd2p_model->approval_request_d2p($rid,$status);
			$this->requestd2p_model->send_coment($data);
	       
	    }
	    elseif (isset($_POST['reject'])) {
	        //$data = $this->requestd2p_model->getDetailRequestById($rid);
	        $this->view_requestd2p_model->reject_request_d2p($rid,$id_role);
	        $this->requestd2p_model->send_coment($data);
	    }elseif (isset($_POST['coment'])) {
	    	 $this->requestd2p_model->send_coment($data);
	    }


		
		
		
		redirect('index.php/request_d2p/detail_request_d2p/'.$rid.'');
		print_r($data);
	}
// SEND EMAIL
	
    function email_Send($id){

    	$data = $this->requestd2p_model->getDetailRequestById($id);
    	
    	//echo $data['0']->id;
    	
    	print_r($data);
    	$ido = '29';
    	//echo $data->project_name;
    	//echo $data[0]->id;
    	//print_r(@$data[0]->id);
    	//echo var_dump($data);
    	
    	//$data = $data + array(null);
    	echo $data[0]->project_name;
    	echo $data[0]->id;


        	// Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $to = 'rizalmuhammad911@gmail.com';
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
    
		$mail->IsSMTP();
		$mail->CharSet="UTF-8";
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Host = 'tls://smtp.gmail.com:587';
		$mail->Port = 587;
		$mail->Username = 'rizalmdj';
		$mail->Password = 'latitude05106875';
		$mail->SMTPAuth = true;
        
        $mail->setFrom('info@example.com', 'D2P');
        $mail->addReplyTo('info@example.com', 'D2P');
        
        // Add a recipient
        $mail->addAddress($to);
        
        // Add cc or bcc 
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'D2P Request - '.$data[0]->project_name.'';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = 
        	'<html>
			<table width="600" style="border: 1px solid black;">
			  <tr>
			    <td width="100%" align="center" bgcolor="#5776B7"><h1 style="color:#ffff;">D2P Request - '.$data[0]->project_name.' </h1></td>
			  </tr>
			  <tr>
			    <td align="center">
			      <table width="100%" class="table-form">
					<tr><td width="25%">Name <span style="color:red;"></span></td><td><b>'.$data[0]->name.'</b></td></tr>

					<tr><td width="25%">Project Name <span style="color:red;"></span></td><td><b>'.$data[0]->project_name.'</b></td></tr>			

					<tr><td width="25%">Project ID <span style="color:red;"></span></td><td><b>'. $data[0]->project_id.'</b></td></tr>
					
					<tr><td width="25%">Project Manager <span style="color:red;"></span></td><td><b>'. $data[0]->project_manager.'</b></td></tr>			

					<tr><td width="25%">Notes </td><td><b>'. $data[0]->keterangan.'</b></td></tr>				

					<tr><td width="25%">Date  <span style="color:red;">*</span></td><td><b>'. $data[0]->created_date.'</b></td></tr>	
		
					</td></tr>
					<tr>
					<td width="100%" align="center" bgcolor="#5776B7" style="color: #fff;" >This email is generated by stystem, we are not checking the email that have to sent to this email, please kindly open    '.base_url().' for more detailed information.</td>
				</tr>
				</table>   
			  
			</table>
			</html>';
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        } 
    }


}

