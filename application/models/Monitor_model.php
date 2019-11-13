<?php
class Monitor_model extends CI_Model {


	function data(){
        $query = $this->db->query("SELECT DATE(req_date) as tanggal, COUNT(req_date) as 'jumlah_req' FROM tr_request GROUP BY DATE(req_date)");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    function submitted(){
        $query = $this->db->query("
            SELECT  (
                    SELECT COUNT(*)
                    FROM   tr_request
                    WHERE status_req = 1
                    ) AS Draf,
                    (
                    SELECT COUNT(*)
                    FROM   tr_request
                    WHERE status_req = 2 and 4
                    ) AS Waiting,
                    (
                    SELECT COUNT(*)
                    FROM   tr_request
                    WHERE status_req = 5 
                    ) AS Approval,
                    (
                    SELECT COUNT(*)
                    FROM   tr_request
                    WHERE status_req = 6 and 8
                    ) AS Reject,
                    (
                    SELECT COUNT(*)
                    FROM   tr_request
                    ) AS Total
                ");
        if ($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }
}
