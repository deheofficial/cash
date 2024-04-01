<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Register extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model("register_model");

        $this->load->model("listing_model");

        // error_reporting(E_ALL);

        if(get_cookie('_userID')=="" || get_cookie('_userID')==NULL)
        {
            redirect("mainpage/please_login");
        }

    }



    function index(){

        // $this->template->write('titlesite', "Technical Log");

        $this->template->write_view('contentmodule1', "dashboard/main");

        $this->template->parse_template = TRUE;

        $this->template->render();

    }



    function user(){

        $data['user']="active";
        $data['register']="active";
        $data['menu_open_user']="menu-open";

        $this->template->write('titlesite', "Register User");

        $this->template->write_view('contentmodule1', "register/user", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();

    }



    function save_user()
    {   

        // echo "<pre>";print_r($_POST);exit();

        $this->form_validation->set_message('required', 'Please %s');


        $this->form_validation->set_rules('name','Enter Name', 'required');

        $this->form_validation->set_rules('email','Enter Email', 'required'); 

        $this->form_validation->set_rules('staff_id','Enter Staff Id', 'required'); 


        if($this->form_validation->run() == FALSE){

            $this->user();

        }else{

            $this->register_model->save_user();

           

            redirect('listing/users/2');

        }

    }

    


}