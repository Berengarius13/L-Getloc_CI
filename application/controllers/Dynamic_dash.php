<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic_dash extends CI_Controller {

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
        $this->load->model('Dynamic_dash_model');
    }
    // When we will run baseurl/Dynamic_dash it will by default call index method
    // Here we are calling the model, where we will write code to fetch IP
    function index(){
        $data['ip'] = $this->dynamic_dash_model->fetch_ip();
    }
}
/*
* In MVC model (Model, Controller, View) we divide flow of program in three parts
* View takes care of the front end part, the part we show to user
* Model takes care are the logic processing
* Controller is bascially the intermediate between them.
* Note Model and View never interact with each other.
*/
