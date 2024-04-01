<?php

class Register_model extends CI_Model{

    function __construct(){

        parent::__construct();

    }



    function save_user()
    {

        $password = generateRandomString();

        $users = array(

                    'user_fname'=>ucwords($this->input->post('name')),
                    'user_email'=>$this->input->post('email'),
                    'user_pass'=>$this->encrypt->encode($password),
                    'user_phone'=>$this->input->post('phone'),
                    'user_group'=>$this->input->post('user_group'),
                    'user_position'=>$this->input->post('position'),
                    'user_staff_id'=>$this->input->post('staff_id'),
                    'user_company'=>$this->input->post('user_company'),
                    'user_department'=>$this->input->post('user_department'),
                    'user_status'=>2,
                    'user_regby'=>$this->session->userdata('uId'),
                    'user_regdate'=>date("Y-m-d H:i:s"),

                );

                    $this->db->insert("users",$users);


                    //mailNewUser($this->input->post('email'),ucfirst($this->input->post('name')),$password);
    }


    

    



}