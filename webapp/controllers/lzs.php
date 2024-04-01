<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Lzs extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model("listing_model");
        $this->load->model("dashboard_model");
        $this->load->model("lzs_model");



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

        $this->template->write_view('contentmodule1', "lsz/request_petty", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
        
    }

    function save_petty()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->lzs_model->save_petty();
           
        redirect('lzs/list_petty');
    }

    function request_cashadvance()
    {
        $data['cashadvance']="active";
        $data['request_cashadvance']="active";
        $data['menu_open_cashadvance']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "Request Cash Advance");

        $this->template->write_view('contentmodule1', "lsz/request_cashadvance", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }
    function branch()
    {
        $data['utility']="active";
        $data['branch']="active";
        $data['menu_open_utility']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "List of Branch");

        $this->template->write_view('contentmodule1', "lsz/list_branch", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }

    function list_petty()
    {
        $data['petty']="active";
        $data['list_petty']="active";
        $data['menu_open_petty']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "List of Petty Cash Request");

        $this->template->write_view('contentmodule1', "lsz/list_petty", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }


    function update_branch()
    {
        $data['utility']="active";
        $data['branch']="active";
        $data['menu_open_utility']="menu-open";


        $data['branch_id']=base64_decode($this->uri->segment(3));


        $data['result'] = $this->lzs_model->getBranch($data['branch_id']);


        $this->template->write('titlesite', "Update Branch Information");

        $this->template->write_view('contentmodule1', "lsz/update_branch", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }



    function save_update_branch()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->lzs_model->update_branch($this->uri->segment(3));

           
        redirect('lzs/branch/3');
    }




    function register_branch()
    {
        $data['utility']="active";
        $data['branch']="active";
        $data['menu_open_utility']="menu-open";

        $data['success'] = $this->uri->segment(3);

        $this->template->write('titlesite', "Register New Branch");

        $this->template->write_view('contentmodule1', "lsz/register_branch", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();
    }


    function save_new_branch()
    {
        // echo "<pre>";print_r($_POST);exit;

        // echo $this->uri->segment(3);exit;

        $this->lzs_model->save_new_branch();

           
        redirect('lzs/branch/2');
    }

} ?>