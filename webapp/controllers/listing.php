<?php



if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Listing extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model("listing_model");

        $this->load->model("dashboard_model");



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



    function profile(){

    

        $this->load->view('listing/profile',$data);

    }



    function users(){

        $data['user']="active";
        $data['listuser']="active";
        $data['menu_open_user']="menu-open";

        $data['success'] = $this->uri->segment(3);
    

        $this->template->write('titlesite', "List of Users");

        $this->template->write_view('contentmodule1', "listing/users", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();

    }



    function getUsers(){
        // echo $this->totalRecord."lalala ";exit();
        $this->load->library("pagination");

        $cond[]=array("users.user_id not in (1)");

        if($this->uri->segment(3,0))
        {
            if($this->uri->segment(4)=='name')
                $like[]=array("users.user_fname",base64_decode($this->uri->segment(3,0)));
            
            if($this->uri->segment(4)=='role')
                $cond[]=array("users.user_group",$this->uri->segment(3,0));
        }
        $this->totalRecord = $this->listing_model->countUsers($like,$cond);

        $config = array();

        $config["base_url"] = base_url() . "index.php/listing/getUsers/".$this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5)."/";

        $config["total_rows"] = $this->totalRecord;

        $config["per_page"] = 30;

        $config["uri_segment"] = 5;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        $this->page = $page*$config["per_page"];

        $results = $this->listing_model->getAllUsers($config["per_page"],$page,$like,$cond);

        $links = $this->pagination->create_links_javascript("listUsers",base_url()."index.php/listing/getUsers/".$this->uri->segment(3)."/".$this->uri->segment(4)."/",$this->uri->segment(5));

        $no = $page + 1;

        $dt="";

        if(!empty($results)){

            foreach($results as $rs){

                $view = "<a href='".base_url()."index.php/mainpage/profile/update/".base64_encode($rs->user_id)."'  class='link' style='color:blue'>update</a>";

                $view2 = "<a href='".base_url()."index.php/listing/profile/".base64_encode($rs->user_id)."'  class='link' style='color:blue'>PROFILE</a>";

                $id = base64_encode($rs->user_id);

                if($rs->user_status == 1){

                $status =  "<a class='link' href='".base_url()."index.php/mainpage/deactivateuser/$id'><img src='".base_url()."images/tick.png'></img></a>";

                }else

                $status =  "<a class='link' href='".base_url()."index.php/mainpage/activateuser/$id'><img src='".base_url()."images/cross.png'></img></a>";

                
                $dt .= "<tr>
                            <td style=\"vertical-align: middle;\" align=\"center\">$no.</td>
                            <td style=\"vertical-align: middle;\" align=\"left\">".$rs->user_fname."</td>
                            <td style=\"vertical-align: middle;\" align=\"center\">".$rs->user_email."</td>
                            <td style=\"vertical-align: middle;\" align=\"center\">".$rs->user_phone."</td>
                            <td style=\"vertical-align: middle;\" align=\"center\">".getData("company_name2","company","company_id",$rs->user_company)."</td>";
                $dt .= "    <td style=\"vertical-align: middle;\" align=\"center\">".getData("grp_name","user_group","grp_id",$rs->user_group)."</td>";
                
                            //if($this->session->userdata('uGroup')==3 || $this->session->userdata('uGroup')==5){

                $user_group=getData("user_group","users","user_id",get_cookie('_userID'));

               

                $dt .= "    <td style=\"vertical-align: middle;\" align=\"center\">".$status."</td> ";

                            //}
                
                $dt .= "    <td style=\"vertical-align: middle;\" align=\"center\">";
                                $dt.= $view;
                
                $dt.= "</td>";
              
                $dt.= "</tr>";
                $no++;
            }
        }else{

            $dt .= "<tr><td colspan='12' align='center'>No data found !</td></tr>";

            }

            if($links)
                $dt .="<tr><td colspan='12'>$links <br><strong>Total record : $this->totalRecord</strong></td></tr>";
            else
                $dt .="<tr><td colspan='12'><strong>Total record : $this->totalRecord</strong></td></tr>";

            echo $dt;
    }


    







} ?>