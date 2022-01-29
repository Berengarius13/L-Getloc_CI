<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*If the defined() part is true, then it just stops there and doesn’t look at the rest of the line. If it’s not true, then it does evaluate the rest of the line, which is an exit statement, so PHP will happily exit. */
/*
 * Here we have used inheritence, by using extends keyword, Admin class inherits all properties and methods of CI_Controller class
 * $this keyword is used to access methods of CI_Controller class (parent class)
 */
class Admin extends CI_Controller
{	
	/*
    * We are defining a constructer here 
    * This controller will handle http request and create an object
    * This function will run when object of this class has been created
    * So when object of this class has been created it will load dynamic dependent model
    * So we don't have to load it again and again in class.
    */
	function __construct()
    {
        parent::__construct();
        //          date_default_timezone_set('Asia/kabul');
        $this->load->model('Admin_model');
    }

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

			// We load all the datasets in variables
			$page_data['loc_datas'] = $this->Admin_model->fetch_loc();

			//

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

	// For setting date for dropdown
	// We are sending the "ip_id" variable to the model
	public function fetch_date(){
		if($this->input->post('ip')){
			echo $this->Admin_model->fetch_date($this->input->post('ip'));
		}
	}

	public function fetch_time(){
		
		if($this->input->post('date')&& $this->input->post('ip')){
			
			$info = array($this->input->post('date'),$this->input->post('ip'));
			$validate = $this->Admin_model->fetch_time($info);
		}
	}

	public function fetch_location(){
		if($this->input->post('id')){
			echo $this->Admin_model->fetch_location($this->input->post('id'));
		}
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
					// Properly redirect it
					redirect('admin/dev');
				}
				else {
					redirect('admin/dev');
				}
				break;
		}
	}
	public function table_3 ($action, $id=false){
		switch($action){
			case "view":
				$error_data = $this->db->get('error_info')->result_array();
				$page_data['page_title'] = "Error Information Table";
				$page_data['page'] = 'table/error_table';
				$page_data['error_datas'] = $error_data;
				$this->load->view('admin/index', $page_data);
				break;
			
			case "delete":
				if($id){
					$this->db->where('id', $id);
					$this->db->delete('error_info');
					redirect('admin/error');
				}
				else {
					redirect('admin/error');
				}
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
/*
* In MVC model (Model, Controller, View) we divide flow of program in three parts
* View takes care of the front end part, the part we show to user
* Model takes care are the logic processing
* Controller is bascially the intermediate between them.
* Note Model and View never interact with each other.
*/
