<?php
class Departemen_model extends CI_Model {

//DEPARTEMEN

	public function getAllDepDivisi(){
    	$this->db->select('*');
    	$this->db->from('tb_departemen');
    	//$this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
    	//$this->db->order_by('tb_divisi.id_divisi');

    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->result();
    	} else {
    		return array();
    	}
    }

	public function getDivisi($nama_divisi){
		$this->db->select('*');
		$this->db->from('tb_divisi');
		$this->db->where('nama_divisi', $nama_divisi);

		$query = $this->db->get();

    	if ($query->num_rows() > 0){
    		return $query->result()[0]->id_divisi;
    	} else {
    		return array();
    	}
    	   
	} 

	public function getDepDivisi($id_dep){
    	$this->db->select('*');
    	$this->db->from('tb_departemen');
    	$this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
    	$this->db->where('id_dep', $id_dep);

    	$query = $this->db->get();
    	if ($query->num_rows() > 0){
    		return $query->row_array();
    	} else {
    		return array();
    	}
    	
    }

    public function getDepartement($nama_departemen){
        $nama_departemen = $this->input->post('nama_departemen',true);
        $this->db->select('*');
        $this->db->from('tb_departemen');
        $this->db->where('nama_departemen', $nama_departemen);

        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return $query->row_array();
        } else {
            return array();
        }
        
    }




//  ADD DEPARTEMENT

	public function addDepartemen(){
		$nama_divisi = $this->input->post('nama_divisi',true);
		$data = array(
			"nama_departemen" => $this->input->post('nama_departemen',true),
			"id_divisi" => $this->departemen_model->getDivisi($nama_divisi)
		);

		$this->db->insert('tb_departemen', $data);

	}

	public function updatedepartemen($id_dep,$data){
		$this->db->set('nama_departemen', $data['nama_departemen']);
		$this->db->where('id_dep', $id_dep);
		$this->db->update('tb_departemen');

	}

        

//  DELETE DEPARTEMENT

	public function delete_departemen($id_dep, $table){
		$this->db->where('id_dep', $id_dep);
		$this->db->delete($table);

	}  

//  SEARCH MASTER DEPARTMENT

    public function searchMasterDepartement() {
        $q = $this->input->post('q',true);

        $this->db->select ('*');
        $this->db->from('tb_departemen');
        $this->db->join('tb_divisi', 'tb_departemen.id_divisi = tb_divisi.id_divisi');
        $this->db->like('nama_departemen', $q);
        $this->db->or_like('nama_divisi', $q);    

        return $this->db->get()->result();
        // var_dump($this->db->like('name', $a));die;


    }
    

}
