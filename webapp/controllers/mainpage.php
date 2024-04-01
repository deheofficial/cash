<?php




if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Mainpage extends CI_Controller{

    function __construct(){

        parent::__construct();

        $this->load->model("main_model");


    }



    function index($error="")

    {   

        $data['error']=$error;

        $this->load->view('mainpage/login',$data);

    }



    function main()

    {

        $this->template->write('titlesite', "Home Page");

        $this->template->write_view('contentmodule1', "mainpage/main");

        $this->template->parse_template = TRUE;

        $this->template->render();

        // $this->load->view('login');

    }



    function register()

    {   

        $this->load->view('mainpage/register');

    }



    function please_login()

    {

        

        $data['error']=3;

        $this->load->view('mainpage/login',$data);  



    }



    function profile()
    {   
        $data['user']="active";
        $data['listuser']="active";
        $data['menu_open_user']="menu-open";

        if($this->uri->segment(3)=="update")

        {

            $uid=base64_decode($this->uri->segment(4));

            $data['success']=0;

        }

        else if($this->uri->segment(3)=="2")

        {

            $uid=$this->uri->segment(4);

            $data['success']=$this->uri->segment(3);

        }

        else

        {

            $uid=$this->session->userdata('uId');

        }

        

        $data['uid']=$uid;
        $data['result']=$this->main_model->profile($uid);

        $this->template->write('titlesite', "Update User Information");

        $this->template->write_view('contentmodule1', "mainpage/profile", $data);

        $this->template->parse_template = TRUE;

        $this->template->render();

    }



    function update_profile()

    {

        

            $this->main_model->update_profile($this->uri->segment(3));

           

            redirect('mainpage/profile/2/'.$this->uri->segment(3));

    

    }



    function login()

    {   

        // echo "sajsd";    exit; 

        $login = $this->main_model->login();

        $user_status=getData("user_status","users","user_id",$this->session->userdata("uId"));



        // print_r($user_status);exit();



        if($login)//dealer

        {   

            if($user_status==1)

            {

                redirect('dashboard/landing');   

            }

            elseif($user_status==2)

            {

                echo "<script language=\"javascript\">alert('Please change your password !');</script>";

                $this->changePass($this->session->userdata("uId"));

            }  

            elseif($user_status==3)

            {

                //echo "<script language=\"javascript\">alert('Your account has been temporarily suspended, Please contact administrator  !');</script>";
                
                $data['error']=4;

                $this->load->view('mainpage/login',$data);

            }

            elseif($user_status==4)

            {

                //echo "<script language=\"javascript\">alert('Your account has been temporarily suspended, Please contact administrator  !');</script>";
                
                $data['success']=4;

                redirect('mainpage/profile/update/'.base64_encode($this->session->userdata("uId")).'/4');

            }                            

        }      

        else

        {   

            $data['error']=1;

            $this->load->view('mainpage/login',$data);

        }        

    }



    function logout()

    {   

        insertActivityLog("Logout Successful",$this->session->userdata("uId"));

        delete_cookie("_userID");

        delete_cookie("_userName");

        delete_cookie("_loginDateTime");

        delete_cookie("_pswrd");

        delete_cookie("_groupName");

        delete_cookie("_groupID");

        delete_cookie("_uGroup");

        delete_cookie("_fullName");

        $this->session->unset_userdata('user_id');

        $this->session->unset_userdata('fname');

        echo "<script>window.location.href='../../'</script>";

    }



    function forgot()

    {



        $this->load->view('mainpage/forgot',$data);



    }



    function random()

    {   

        $this->form_validation->set_message('required', 'Please %s');



        $this->form_validation->set_rules('email', 'Enter Email', 'required');



        if ($this->form_validation->run() == FALSE){

            

            $this->forgot();

        }

        else{



        $email=$this->input->post("email");



        $mail=getDataCount("users",array(array('user_email',$email)));
        
        //echo $mail;exit;



        $data['email']=$email;



        if($mail>=1)

            {    

                $random=generateRandomString();

                $this->main_model->forgot($random,$email);

                // echo "random string ".$random;exit();

                $data['success']=1;



                $this->load->view('mainpage/random',$data);

            }



        else

            {

                $data['success']=0;

                $this->load->view('mainpage/random',$data);

            }    



        }

    }





    function changePass($uid)

    {

        $data['uid']=$uid;

        $this->load->view('mainpage/change',$data);   

    }



    function updatePass()

    {

        // print_r($_POST);exit();

        $this->main_model->updatePass($this->uri->segment(3));

        $data['error']=2;

        $this->load->view('mainpage/login',$data);  

        // $this->load->view('mainpage/success_updated');



    }



    function activateuser(){

        $id = base64_decode($this->uri->segment(3));

        $this->main_model->activateuser($id);

        redirect('listing/users/');

    }



    function deactivateuser(){

        $id = base64_decode($this->uri->segment(3));

        $this->main_model->deactivateuser($id);

        redirect('listing/users/');

    }

    function inactiveuser(){

        $id = $this->uri->segment(3);

        $this->main_model->inactiveuser($id);

        redirect('listing/users/');

    }





}