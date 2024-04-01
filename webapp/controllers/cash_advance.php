<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Cash_advance extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model("listing_model");
        $this->load->model("dashboard_model");
        $this->load->model("cashadvance_model");



        if(get_cookie('_userID')=="" || get_cookie('_userID')==NULL)
        {
            redirect("mainpage/please_login");
        }

    }

    function index(){

        // $this->template->write('titlesite', "Technical Log");

        $this->template->write_view('contentmodule1', "listing/main");

        $this->template->parse_template = TRUE;

        $this->template->render();

    }
    
    function request_cashadvance()
    {
        $data['cashadvance']="active";
        $data['request_cashadvance']="active";
        $data['menu_open_cashadvance']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "Request Cash Advance");

        $this->template->write_view('contentmodule1', "petty_cash/request_cashadvance", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function save_ca()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->cashadvance_model->save_ca();
           
        redirect('cash_advance/list_CA');
    }

    function list_CA()
    {
        $data['cashadvance']="active";
        $data['list_CA']="active";
        $data['menu_open_cashadvance']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "List of Cash Advance Request");

        $this->template->write_view('contentmodule1', "petty_cash/list_CA", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function update_ca()
    {
        $data['cashadvance']="active";
        $data['list_CA']="active";
        $data['menu_open_cashadvance']="menu-open";


        $data['ca_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->cashadvance_model->getca($data['ca_id']);


        $this->template->write('titlesite', "Update Cash Advance Information");

        $this->template->write_view('contentmodule1', "petty_cash/update_ca", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function save_update_ca()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->cashadvance_model->update_ca($this->uri->segment(3));

           
        redirect('cash_advance/list_CA/3');
    }


    function verify_ca()
    {
        $data['cashadvance']="active";
        $data['list_CA']="active";
        $data['menu_open_cashadvance']="menu-open";


        $data['ca_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->cashadvance_model->getca($data['ca_id']);


        $this->template->write('titlesite', "Verify Cash Advance Information");

        $this->template->write_view('contentmodule1', "petty_cash/verify_ca", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function save_verify_ca()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(4);exit;

        $this->cashadvance_model->verify_ca($this->uri->segment(3));

           
        redirect('cash_advance/list_CA/3');
    }

    function authorise_ca()
    {
        $data['cashadvance']="active";
        $data['list_CA']="active";
        $data['menu_open_cashadvance']="menu-open";


        $data['ca_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->cashadvance_model->getca($data['ca_id']);


        $this->template->write('titlesite', "Authorise Cash Advance Information");

        $this->template->write_view('contentmodule1', "petty_cash/authorise_ca", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function save_authorise_ca()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(4);exit;

        $this->cashadvance_model->authorise_ca($this->uri->segment(3));

           
        redirect('cash_advance/list_CA/3');
    }

    function approve_ca()
    {
        $data['cashadvance']="active";
        $data['list_CA']="active";
        $data['menu_open_cashadvance']="menu-open";


        $data['ca_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->cashadvance_model->getca($data['ca_id']);


        $this->template->write('titlesite', "Approve Cash Advance Information");

        $this->template->write_view('contentmodule1', "petty_cash/approve_ca", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function save_approve_ca()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(4);exit;

        $this->cashadvance_model->approve_ca($this->uri->segment(3));

           
        redirect('cash_advance/list_CA/3');
    }

    function view_ca()
    {
        $data['cashadvance']="active";
        $data['list_CA']="active";
        $data['menu_open_cashadvance']="menu-open";


        $data['ca_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->cashadvance_model->getca($data['ca_id']);


        $this->template->write('titlesite', "Cash Advance Information");

        $this->template->write_view('contentmodule1', "petty_cash/view_ca", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }
} ?>