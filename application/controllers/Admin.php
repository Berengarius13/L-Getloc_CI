<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*If the defined() part is true, then it just stops there and doesn’t look at the rest of the line. If it’s not true, then it does evaluate the rest of the line, which is an exit statement, so PHP will happily exit. */
/*
 * Here we have used inheritence, by using extends keyword, Admin class inherits all properties and methods of CI_Controller class
 * $this keyword is used to access methods of CI_Controller class (parent class)
 */
class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// We write condition to check whose userid it is 
        /* Why @ is used */
		// $_POST['key value'] in core php
		if ($this->input->post()){
			// We get email and password from user
			$email = $this->input->post('email_id');
			$password = sha1($this->input->post('password'));

			// We check wether data is available in database or not
			// => is used for array declaration in php	
			// validation step														// If all this is true return result array
			$result = $this->db->get_where('users',array('email_id' => $email, 'password' => $password, 'account_status' => 1, 'role' => 'SUADMIN'))->result_array();
			// To check wether it is working or not :print_r($result);
			// array resulted is of special form so to access variable from it what we will do is
			$uid = $result[0]['id'];
			$first_name = $result[0]['first_name'];
			$last_name = $result[0]['last_name'];
			$email = $result[0]['email_id'];

			// we will set superglobal variable of $_SESSION
			$this->session->set_userdata('admin_uid', $uid);
			$this->session->set_userdata('admin_first_name', $first_name);
			$this->session->set_userdata('admin_last_name', $last_name);
			$this->session->set_userdata('admin_email', $email);
		}
		// here we check if admin u_id is set or not
        if (@$this->session->userdata['admin_uid']){
            // redirect to dasboard
            $page_data['page_title'] = "Dashboard";
            $page_data['page'] = "dashboard";
            $this->load->view('admin/index', $page_data);
        }
        // If users user id is used it automatically redirects to the login page
        else{
            $page_data['page_title'] = "Login Admin";
            
            $this->load->view('admin/login', $page_data);
        }

		

		// $this is use for current class
	}
	public function table_1 ($action, $id = false){
		switch($action){
			case "view":
				$loc_data = $this->db->get("result_info")->result_array();
				$page_data['page_title'] = "Location Table";
				$page_data['page'] = 'table/location_table';
				$page_data['loc_datas'] = $loc_data;
				$this->load->view("admin/index", $page_data);
				break;
			
			case "delete":
				if($id){
					$this->db->where('id', $id);
					$this->db->delete('result_info');
					redirect('admin/loc');
				}
				else{
					redirect('admin/loc');
				}
				break;
		}
	}
	public function table_2 ($action, $id=false){
		switch($action){
			case "view":
				$dev_data = $this->db->get('device_info')->result_array();
				$page_data['page_title'] = "Device Information Table";
				$page_data['page'] = 'table/device_table';
				$page_data['dev_datas'] = $dev_data;
				$this->load->view('admin/index', $page_data);
				break;
			
			case "delete":
				if($id){
					$this->db->where('id', $id);
					$this->db->delete('device_info');
					redirect('admin/table_2/view');
				}
				else {
					redirect('admin/table_2/view');
				}
				break;
		}
	}
	public function table_3 ($action, $id){
		switch($action){
			case "view":

				break;
			
			case "delete":

				break;
		}
	}
	// public function team ($action, $id = false){
	// 	switch($action){
	// 		case "view":
	// 			// Add table name here
	// 				$loc_data = $this->db->get("result_info")->result_array();
	// 				$page_data['page_title'] = "Location Data";
	// 				$page_data['loc_datas'] = $loc_data;
					
	// 				$page_data['page'] = "table/location_table";
	// 				$this->load->view('admin/index', $page_data);
	// 			break;
			
	// 		case "add": 
	// 			echo "add";
	// 			break;
			
	// 		case "edit":
	// 			echo "edit";
	// 			break;
			
	// 		case "delete":
	// 			// WE will check first wether Id is there or not
	// 			// Where helps to generat WHERE clause
	// 			if($id){
	// 				$this->db->where('id', $id);
	// 				$this->db->delete('result_info');
	// 				redirect("admin/team");
	// 			}
	// 			else
	// 			{redirect("admin/team");} 

	// 			break;
			
	// 		case "active":
	// 			echo "id = ".$id;
	// 			echo "active";
	// 			break;

	// 		case "inactive":
	// 			echo "id = ".$id;
	// 			echo "inactive";
	// 			break;



	// 	}

	// }
	public function logout()
    {   
        // Why this?
		// works same as session_destroy() of vanilla php, it destroys the session 
        $this->session->sess_destroy();
		redirect('admin');
    }

}
