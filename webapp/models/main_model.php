<?php


class Main_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function login(){

        $userX=$this->input->post("signin_username");
        $pass=$this->input->post("signin_password");
        
        $user=$userX.'@';
        // echo $user;

        $sql = $this->db->query("select * from users where user_email like '$userX' or user_email like '$user%' ");
        // echo $this->db->last_query();exit;
        $count = $sql->num_rows();
        $opt = FALSE;

        if($count>0){

            $rec = $sql->result();
            foreach($rec as $row){
                if($this->encrypt->decode($row->user_pass) == $pass){
                // if($pass == "1234"){
                    $this->load->helper('cookie'); 

                    $cookie = array( 
                        'name' => '_userID', 
                        'value' => $row->user_id, 
                        'expire' => time()+3600 
                    ); 
                    set_cookie($cookie); 
                    $this->session->set_userdata('uId',$row->user_id);
                    
                    $cookie = array( 
                        'name' => '_fullName', 
                        'value' => $row->user_fname, 
                        'expire' => time()+3600 
                    ); 
                    set_cookie($cookie);
                    $this->session->set_userdata('fname',$row->user_fname);


                    $cookie = array( 
                        'name' => '_pswrd', 
                        'value' => $pass, 
                        'expire' => time()+3600 
                    ); 
                    set_cookie($cookie); 


                    $cookie = array( 
                        'name' => '_uGroup', 
                        'value' => $row->user_group, 
                        'expire' => time()+3600  
                    ); 
                    set_cookie($cookie);
                    $this->session->set_userdata('uGroup',$row->user_group);

                    insertActivityLog("Login Successful",$row->user_id);

                    $opt = TRUE;
                }
            }
            
        }else
            $opt = FALSE;

            return $opt;


    }

    function profile($uid)
    {
        $sql = $this->db->select("*")
                        ->from("users")
                        ->where("user_id",$uid)
                        ->get();
        // echo $this->db->last_query();exit();
        return $sql->row();
    }

    function update_profile($uid)
    {
        // echo "<pre>";print_r($_POST);exit;
        $profile = array(
                
                    'user_group'=>$this->input->post('user_group'),
                    'user_warehouse'=>$this->input->post('warehouse'),
                    'user_pass'=>$this->encrypt->encode($this->input->post('password')),
                    'user_phone'=>$this->input->post('phone'),
                    'user_status'=>1,
  
                );
                
                
                    $this->db->update("users",$profile,array('user_id'=>$uid));
                
    }
    
    function forgot($random,$email)
    {
        $pass=$this->encrypt->encode($random);

        $users = array(
            
            'user_pass'     => $pass,
            'user_status'   => 2,

        );

        $this->db->update("users",$users,array('user_email'=>$email));

        $name=getData("user_fname","users","user_email",$email);

        mailForgotPassword($email,$name,$random);
    }
    
    function updatePass($uid)
    {   
        // print_r($_POST);exit();
        $password=$this->input->post("newpass");
        $pass=$this->encrypt->encode($password);

        // print_r($pass);
        // print_r($this->encrypt->decode($pass));exit();
        $users = array(
            
            'user_pass'     => $pass,
            'user_status'   => 1,

        );

        $this->db->update("users",$users,array('user_id'=>$uid));
    }

    function activateuser($uid)
    {
        $profile = array(
                
                    'user_status'=>1,
                    
                );
                
                
                    $this->db->update("users",$profile,array('user_id'=>$uid));
                
    }

    function deactivateuser($uid)
    {
        $profile = array(
                
                    'user_status'=>3,
                    
                );
                
                
                    $this->db->update("users",$profile,array('user_id'=>$uid));
                
    }


    function inactiveuser($uid)
    {
        $profile = array(
                
                    'user_status'=>4,
                    
                );
                
                
                    $this->db->update("users",$profile,array('user_id'=>$uid));
                
    }

}