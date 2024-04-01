<?php


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("dashboard_model");
        $this->load->model("listing_model");

        if(get_cookie('_userID')=="" || get_cookie('_userID')==NULL)
        {
            redirect("mainpage/please_login");
        }
    }

    function index(){

        $this->template->write('titlesite', "Dashboard");
        $this->template->write_view('contentmodule1', "dashboard/blank", $data);
        $this->template->parse_template = TRUE;
        $this->template->render();
    }


    function landing()
    {     

        $data['dashboard']="active";


        // $data['result'] = $this->seltrade_model->getProducts($data['product_id']);

        $this->template->write('titlesite', "Dashboard");
        $this->template->write_view('contentmodule1', "dashboard/main", $data);
        $this->template->parse_template = TRUE;
        $this->template->render();


    }


    


}