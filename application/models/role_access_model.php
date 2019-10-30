<?php
class Role_access_model extends CI_Model {

// VIEW ROLE ACCESS MODEL

	public function getAllRoleAccess(){
    	$this->db->select('*');
    	$this->db->from('tb_role_access');
    	$this->db->order_by("role_access", "asc");

    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }

//	ADD ROLE ACCESS

     public function add_role_access() {
        $data = array(
            "role_access" => $this->input->post('role_access',true),
        );
        $this->db->insert('tb_role_access', $data);

    }


// GET ALL EDIT ROLE ACCESS BY ID MODEL

    public function getAllEditRoleAccess(){
        $this->db->select('*');
        $this->db->from('tb_role_access');
        $this->db->where('id_role_access');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

//      getRoleaccess
    
        public function getRoleaccess($role_access){
        $this->db->select('*');
        $this->db->from('tb_role_access');
        $this->db->where('role_access', $role_access);

        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result()[0]->id_role_access;
        } else {
            return array();
        }

    }


// EDIT ROLE ACCESS BY ID MODEL

     public function getEditRoleAccessById($id_role_access){
        $this->db->select('*');
        $this->db->from('tb_role_access');
        $this->db->where('id_role_access', $id_role_access);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

// EDIT ROLE ACCESS 

    public function edit_role_acess() {
        $data = array(
            "role_access" => $this->input->post('role_access',true)
        );
        $this->db->where('id_role_access', $this->input->post('id_role_access',true));
        $this->db->update('tb_role_access', $data);

    }

// DELETE REQUEST D2P MODEL

    public function delete_role_access($id_role_access,$table){
        $this->db->where('id_role_access',$id_role_access);
        $this->db->delete($table);
    }

//  SEARCH REQUEST D2P

    public function searchRoleAccess() {
        $q = $this->input->post('q',true);

        $this->db->select('*');
        $this->db->from('tb_role_access');
        $this->db->like('role_access', $q);        

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;

    }

    
}
