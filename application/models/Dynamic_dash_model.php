<?php

class Dynamic_dash_model extends CI_Model
{
    function fetch_ip(){
        $query = $this->db->get('result_info');
        return $query->result();
    }

}
