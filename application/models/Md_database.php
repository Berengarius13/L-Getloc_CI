<?php

class Md_database extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        //          date_default_timezone_set('Asia/kabul');
        date_default_timezone_set('Asia/Kolkata');
    }

    //function for inserting data into table
    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
        die;
        $this->db->trans_complete();
        return $this->db->insert_id();
    }
}
