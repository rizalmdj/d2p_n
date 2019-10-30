<?php
class M_divisi_model extends CI_Model {

//  VIEW MASTER DIVISI MODEL

	public function getAllDivisi(){
    	$this->db->select('*');
    	$this->db->from('tb_divisi');
      
    	// $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
    	// $this->db->order_by('tb_divisi.id_divisi');

    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }
    
    public function getDivisi($id_divisi){
        $this->db->select('*');
        $this->db->from('tb_divisi');
        $this->db->where('id_divisi', $id_divisi);
        // $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
        // $this->db->order_by('tb_divisi.id_divisi');

        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return array();
        }
    }
    
    public function getidDivisi($id_divisi){
        $this->db->select('*');
        $this->db->from('tb_divisi');
        $this->db->where('id_divisi', $id_divisi);
        // $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
        // $this->db->order_by('tb_divisi.id_divisi');

        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return array();
        }
    }

    
    
        

//  ADD MASTER DIVISI MODEL

    public function add_master_divisi() {
        $data = array(
            "nama_divisi" => $this->input->post('nama_divisi',true),
        );
        $this->db->insert('tb_divisi', $data);

    }


// // EDIT MASTER DIVISI

    public function edit_divisi() {
        $data = array(
            "nama_divisi" => $this->input->post('nama_divisi',true),

         );
        $this->db->where('id_divisi', $this->input->post('id_divisi',true));
        $this->db->update('tb_divisi', $data);
    }


// DELETE
    public function delete_divisi($id_divisi, $table){
        $this->db->where('id_divisi', $id_divisi);
        $this->db->delete($table);

    }  

//  SEARCH REQUEST D2P

    public function searchMasterDivisi() {
        $q = $this->input->post('q',true);

        $this->db->select('*');
        $this->db->from('tb_divisi');
        $this->db->like('nama_divisi', $q);    

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;


    }



}

