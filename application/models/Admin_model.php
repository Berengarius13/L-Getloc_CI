<?php

class Admin_model extends CI_Model
{
    function fetch_loc()
    {
        $query = $this->db->get('result_info');
        return $query->result();
    }

    function fetch_date($ip)
    {
        $this->db->where('created_ip_address', $ip);
        $this->db->order_by('creation_date', 'ASC');
        $query = $this->db->get('result_info');
        $output = '<option value = "">Select Date</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->creation_date . '">' . $row->creation_date. '</option>';
        }
        return $output;
    }
    function fetch_time($info){
        
        $this->db->where('creation_date', $info[0]);
        $this->db->where('created_ip_address', $info[1]);
        $this->db->order_by('creation_time', 'ASC');
        $query = $this->db->get('result_info');
        $data = $query->result();
        print_r($data);
        $output = '<option value = "">Select Time</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->creation_time. '</option>';
        }
        // Why not working without print_r?
        print_r(($output));
        return $output;
    }
}
