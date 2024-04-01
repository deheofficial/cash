<?php



class Cashadvance_model extends CI_Model{

    function __construct(){

        parent::__construct();

    }

    function getca($ca_id)
    {
        $sql = $this->db->select("*")

                        ->from("cashadvance")

                        ->where('ca_id',$ca_id)

                        ->get();

        // echo $this->db->last_query();exit();

        return $sql->row();
    }

    function get_companies() {
        $query = $this->db->get('company');
        return $query->result_array();
    }
    
    function update_ca($ca_id)
    {
        
        $request_cashadvance = array(

                'ca_user_id' => get_cookie('_userID'),
                'purpose' => $this->input->post('purpose'),
                'company' => $this->input->post('ca_company'),
                'category' => $this->input->post('ca_project'),
                'cash' => $this->input->post('cash'),
                'status' => 1,
                );

                    $this->db->update("ca",$request_ca,array("ca_id"=>$ca_id));
    }

    function save_ca()
    {
        $current_date = date('Y-m-d H:i:s');

        $request_cashadvance = array(
            'ca_user_id' => get_cookie('_userID'),
            'ca_date' => $current_date,
            'ca_purpose' => $this->input->post('purpose_ca'),
            'ca_company' => $this->input->post('company_ca'),
            'ca_category' => $this->input->post('project_ca'),
            'ca_cash' => $this->input->post('cash_ca'),
            'ca_status' => 1,
        );
    
        $this->db->set($request_cashadvance); // Use set() method to specify the data to be inserted
        $this->db->insert('cashadvance'); // Call insert() method to perform the insertion
    }

    function verify_ca($ca_id)
    {
        $ca_status = $this->input->post('ca_status');
        if($ca_status == 'verify')
        {
            $verifiedstatus = 2;
        }
        else 
        {
            $verifiedstatus = 9; 
        }
    
        $request_cashadvance = array(
            'ca_status' => $verifiedstatus,
            'ca_remarks' => $this->input->post('ca_remarks'),
        );
    
        $this->db->update("cashadvance", $request_cashadvance, array("ca_id" => $ca_id));
    }

    function authorise_ca($ca_id)
    {
        $ca_status = $this->input->post('ca_status');
        if($ca_status == 'authorise')
        {
            $authorisedstatus = 3;
        }
        else 
        {
            $authorisedstatus = 9; 
        }
    
        $request_cashadvance = array(
            'ca_status' => $authorisedstatus,
            'ca_remarks' => $this->input->post('ca_remarks'),
        );
    
        $this->db->update("cashadvance", $request_cashadvance, array("ca_id" => $ca_id));
    }

    function approve_ca($ca_id)
    {
        $ca_status = $this->input->post('ca_status');
        if($ca_status == 'approve')
        {
            $approvedstatus = 4;
        }
        else 
        {
            $approvedstatus = 9; 
        }
    
        $request_cashadvance = array(
            'ca_status' => $approvedstatus,
            'ca_remarks' => $this->input->post('ca_remarks'),
        );
    
        $this->db->update("cashadvance", $request_cashadvance, array("ca_id" => $ca_id));
    }
    

    function view_ca($ca_id)
    {

        $request_petty = array(

                'ca_user_id' => get_cookie('_userID'),
                'ca_purpose' => $this->input->post('ca_purpose'),
                'ca_company' => $this->input->post('ca_company'),
                'ca_category' => $this->input->post('ca_project'),
                'ca_cash' => $this->input->post('ca_cash'),
                'ca_status' => 2,
                'ca_remarks' => $this->input->post('ca_remarks'),
                );

                    $this->db->update("cashadvance",$request_cashadvance,array("ca_id"=>$ca_id));
    }
    


    

    


}