<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Petty_cash extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model("listing_model");
        $this->load->model("dashboard_model");
        $this->load->model("pettycash_model");



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

    function request_petty()
    {
        $data['petty']="active";
        $data['request_petty']="active";
        $data['menu_open_petty']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "Request Petty Cash");

        $this->template->write_view('contentmodule1', "petty_cash/request_petty2", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
        
    }

    function save_petty()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->pettycash_model->save_petty();
           
        redirect('petty_cash/list_petty');
    }

    function list_petty()
    {
        $data['petty']="active";
        $data['list_petty']="active";
        $data['menu_open_petty']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "List of Petty Cash Request");

        $this->template->write_view('contentmodule1', "petty_cash/list_petty", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }


    function update_petty()
    {
        $data['petty']="active";
        $data['list_petty']="active";
        $data['menu_open_petty']="menu-open";


        $data['petty_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->pettycash_model->getpetty($data['petty_id']);


        $this->template->write('titlesite', "Update Petty Information");

        $this->template->write_view('contentmodule1', "petty_cash/update_petty", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function check_petty()
    {
        $data['petty']="active";
        $data['list_petty']="active";
        $data['menu_open_petty']="menu-open";


        $data['petty_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->pettycash_model->getpetty($data['petty_id']);


        $this->template->write('titlesite', "Approve Petty Information");

        $this->template->write_view('contentmodule1', "petty_cash/check_petty", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function view_petty()
    {
        $data['petty']="active";
        $data['list_petty']="active";
        $data['menu_open_petty']="menu-open";


        $data['petty_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->pettycash_model->getpetty($data['petty_id']);


        $this->template->write('titlesite', "Petty Information");

        $this->template->write_view('contentmodule1', "petty_cash/view_petty", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function create_pettyvoucher()
    {
        $data['petty']="active";
        $data['list_petty']="active";
        $data['menu_open_petty']="menu-open";


        $data['petty_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->pettycash_model->getpetty($data['petty_id']);


        $this->template->write('titlesite', "Create Petty Voucher");

        $this->template->write_view('contentmodule1', "petty_cash/create_pettyvoucher", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function save_update_petty()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->pettycash_model->update_petty($this->uri->segment(3));

           
        redirect('petty_cash/list_petty/3');
    }

    function save_check_petty()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(4);exit;

        $this->pettycash_model->check_petty($this->uri->segment(3));

           
        redirect('petty_cash/list_petty/3');
    }

    function save_pettyvoucher()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(4);exit;

        $this->pettycash_model->create_pettyvoucher($this->uri->segment(3));

           
        redirect('petty_cash/list_petty/3');
    }

} ?>

