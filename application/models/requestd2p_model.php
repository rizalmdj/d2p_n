<?php
class Requestd2p_model extends CI_Model {

//  VIEW GET ALL REQUEST D2P MODEL

	public function getAllRequest(){
    	$this->db->select('*');
    	$this->db->from('tr_request');
    	$this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->order_by("created_date", "desc");
    	
    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }

// GET  USER REQUEST D2P MODEL-------------------------------------------

    public function getUserRequest($id){
        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->order_by("created_date", "desc");
        $this->db->where('name', $id);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

//  GET ALL EDIT REQUEST D2P MODEL

    public function getAllEditRequest(){
        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status','tr_request.status_req = m_status.id_status');
        $this->db->join('tr_upload_file','tr_request.id = tr_upload_file.id');
        $this->db->where('tr_upload_file.id');
                
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

//  GET EDIT REQUEST D2P MODEL

     public function getEditRequestById($id){
        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status','tr_request.status_req = m_status.id_status');
        $this->db->join('tr_upload_file','tr_request.id_upload_file = tr_upload_file.id','left');
        $this->db->where('tr_request.id', $id);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

//Get data Detail
    public function getDetailRequestById($id){
        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status','tr_request.status_req = m_status.id_status');
        $this->db->join('tr_upload_file','tr_request.id_upload_file = tr_upload_file.id','left');
        $this->db->join('t_admin','tr_request.name = t_admin.nama');
        $this->db->where('tr_request.id', $id);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }  

// ADD REQUEST D2P MODEL    

    public function add_request($filename1,$filename2,$filename3,$filename4,$filename5,$filename6) {
        $var = $this->session->userdata;


        $maxid = 0;
        $row = $this->db->query('SELECT MAX(id) AS `maxid` FROM `tr_upload_file`')->row();
        if ($row) {
            $maxid = $row->maxid; 
        }        

        $datauploadfile = array ( 
            "id" => $maxid+1,
            "upload_file1" => $filename1,
            "upload_file2" => $filename2,
            "upload_file3" => $filename3,
            "upload_file4" => $filename4,
            "upload_file5" => $filename5,
            "upload_file6" => $filename6,
        );

        $data = array(
            "name" => $var['nama'],
            "project_name" => $this->input->post('project_name',true),
            "project_id" => $this->input->post('project_id',true),
            "project_manager" => $this->input->post('project_manager',true),
            "keterangan" => $this->input->post('keterangan',true),
            "req_date" => $this->input->post('req_date',true),
            "created_date" => date('Y-m-d H:i:s'),
            "status_req" => '1',
            "update_date" => date('Y-m-d H:i:s'),
            "created_by" => $var['id'],
            "id_upload_file" => $maxid+1
        );

        $this->db->trans_start();
        //nanti ditambahi kondisi disini agar uploadfile jalan dulu dan sukses baru tr_request diproses -yoga
        $this->db->insert('tr_upload_file', $datauploadfile);
        $this->db->insert('tr_request', $data);        
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
        else
            {
                $this->db->trans_commit();
            }   

    }

// EDIT REQUEST D2P MODEL

    public function edit_request() {
        $var = $this->session->userdata;
        $id_d2p = $this->input->post('id_d2p', true);

        $data = array(
            "name" => $var['nama'],
            "project_name" => $this->input->post('project_name',true),
            "project_id" => $this->input->post('project_id',true),
            "project_manager" => $this->input->post('project_manager',true),
            "keterangan" => $this->input->post('keterangan',true),
            "req_date" => $this->input->post('req_date',true),
            //di hapus karena kita bisa gunakan fitue timestamp dari sql nya langsung hehehe :)
            //"update_date" => date('Y-m-d H:i:s'),
        );
        //$id = "16";
        $this->db->trans_start();
        $this->db->where('id', $id_d2p);
        $this->db->update('tr_request', $data);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
        else
            {
                $this->db->trans_commit();
            }   

    }
    public function edit_request_data ($filename1,$filename2,$filename3,$filename4,$filename5,$filename6){
        $datauploadfile1 = array ( 
            "upload_file1" => $filename1,
            "upload_file2" => $filename2,
            "upload_file3" => $filename3,
            "upload_file4" => $filename4,
            "upload_file5" => $filename5,
            "upload_file6" => $filename6,
        );

        
        $this->db->where('id',$this->input->post('id',true));
        $this->db->update('tr_upload_file', $datauploadfile1);
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
        else
            {
                $this->db->trans_commit();
            }   
    }


// DELETE REQUEST D2P MODEL

    public function delete_request_d2p($id, $table){
        $this->db->where('id', $id);
        $this->db->delete($table);

    }  

//  SUBMIT REQUEST D2P BELOM SELESAI

    public function submit_request_d2p($id){
        $data = array(
            "status_req" => '2'
            // "update_date" => $this->input->post(NOW(),true)
        );
        $this->db->where('id', $id);
        $this->db->update('tr_request', $data);

    }

//  SEARCH REQUEST D2P

    public function searchRequestd2p() {
        $a = $this->input->post('a',true);

        $this->db->select('*');
        $this->db->from('tr_request');
        $this->db->join('m_status', 'tr_request.status_req = m_status.id_status');
        $this->db->like('name', $a);
        $this->db->or_like('project_name', $a);
        $this->db->or_like('project_id', $a);
        $this->db->or_like('status_name', $a);
        $this->db->or_like('req_date', $a);
        

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;


    }

}
?>
