<?php
class M_user_model extends CI_Model {


//MASTER USER

	public function getAlluser(){
    	$this->db->select('*');
    	$this->db->from('t_admin');
    	$this->db->join('tb_role_access', 't_admin.id_role_access = tb_role_access.id_role_access');
        $this->db->join('tb_divisi', 't_admin.id_divisi = tb_divisi.id_divisi');
        $this->db->join('tb_departemen', 't_admin.id_dep = tb_departemen.id_dep');

    $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }    

    }


//  ADD MASTER USER

    public function add_master_user_model(){
        $this->load->model(array('role_access_model','m_divisi_model','departemen_model'));
        $role_access = $this->input->post('role_access',true);
        if($role_access == 1){
            $level = "Super Admin";
        } elseif($role_access == 2){
            $level = "Requester";
        } elseif($role_access == 3){
            $level = "Approval1";
        } elseif($role_access == 4){
            $level = "Approval2";
        }
        $nama_divisi = $this->input->post('nama_divisi',true);
        $nama_departemen = $this->input->post('nama_divisi',true);
        $data = array(
            "username" => $this->input->post('username',true),
            "password" => md5($this->input->post('password',true)),
            "nama" => $this->input->post('nama',true),
            "id_karyawan" => $this->input->post('id_karyawan',true),
            "level" => $level,
            "email" => $this->input->post('email',true),
            "status" => $this->input->post('status',true),
            "id_role_access" => $this->input->post('role_access',true),
            "id_divisi" => $this->input->post('nama_divisi',true),
            "id_dep" => $this->input->post('nama_divisi',true)
        );

        $this->db->insert('t_admin', $data);               
        return true;
    }

    public function findDept($division){

        $this->db->select('*');
        $this->db->from('tb_departemen');
        $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
        $this->db->where('tb_divisi.id_divisi',$division);
        $this->db->order_by('tb_divisi.id_divisi');

        $query = $this->db->get();
        return $query->result();
        
    }

    // public function updatedepartemen($id_dep,$data){
    //     $this->db->set('nama_departemen', $data['nama_departemen']);
    //     $this->db->where('id_dep', $id_dep);
    //     $this->db->update('tb_departemen');

    // }
    

//  SEARCH MASTER DATA USER

    public function searchMasterDataUser() {
        $q = $this->input->post('q',true);

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_role_access', 'tb_user.id_role_access = tb_role_access.id_role_access');
        $this->db->like('id_karyawan', $q);
        $this->db->or_like('user_name', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('realname', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('status', $q);
        

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;

    }
//  NEW PASS
    public function new_pass($id,$status_pas){
        $data = array(
            "status_pas" => $status_pas,
            "password"   => md5($this->input->post('confirm_password',true))
        );
        $this->db->where('username', $id);
        $this->db->update('t_admin', $data);

    }
// RESET PASS
    public function reset_pass($id){
        $pass = 'rajinbekerja';
        $data = array(
            "status_pas" => '0',
            "password"   => md5($pass)
        );

        $this->db->where('id', $id);
        $this->db->update('t_admin', $data);
    }

// DELET USER

    public function delet_user($id){
        $this->db->where('id', $id);
        $this->db->delete('t_admin');
    }


}
