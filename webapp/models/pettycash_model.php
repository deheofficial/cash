<?php



class Pettycash_model extends CI_Model{

    function __construct(){

        parent::__construct();

    }


    function getpetty($petty_id)
    {
        $sql = $this->db->select("*")

                        ->from("petty")

                        ->where('petty_id',$petty_id)

                        ->get();

        // echo $this->db->last_query();exit();

        return $sql->row();
    }

    function get_companies() {
        $query = $this->db->get('company');
        return $query->result_array();
    }
    
    function update_petty($petty_id)
    {
        
        $request_petty = array(

                'petty_user_id' => get_cookie('_userID'),
                'purpose' => $this->input->post('purpose'),
                'company' => $this->input->post('petty_company'),
                'category' => $this->input->post('petty_project'),
                'cash' => $this->input->post('cash'),
                'status' => 1,
                );

                    $this->db->update("petty",$request_petty,array("petty_id"=>$petty_id));
    }

    function check_petty($petty_id)
    {
        // echo $this->input->post('status');exit;
        $status = $this->input->post('status');
        if($status == 'approve')
        {
            $approvedstatus = 2;
        }
        else 
        {
            $approvedstatus = 6; 
        }

        $request_petty = array(

                
                'status' => $approvedstatus,
                'petty_remarks' => $this->input->post('petty_remarks'),

                );

                    $this->db->update("petty",$request_petty,array("petty_id"=>$petty_id));
    }

    function view_petty($petty_id)
    {

        $request_petty = array(

                'petty_user_id' => get_cookie('_userID'),
                'purpose' => $this->input->post('purpose'),
                'company' => $this->input->post('petty_company'),
                'category' => $this->input->post('petty_project'),
                'cash' => $this->input->post('cash'),
                'status' => 2,
                'petty_remarks' => $this->input->post('petty_remarks'),
                );

                    $this->db->update("petty",$request_petty,array("petty_id"=>$petty_id));
    }


    function save_petty()
    {
        $current_date = date('Y-m-d H:i:s');

        $request_petty = array(
            'petty_user_id' => get_cookie('_userID'),
            'date' => $current_date,
            'purpose' => $this->input->post('purpose'),
            'petty_department' => getData ('user_department', 'users', 'user_id', get_cookie('_userID') ),
            'company' => $this->input->post('petty_company'),
            'category' => $this->input->post('petty_project'),
            'cash' => $this->input->post('cash'),
            'status' => 1,
        );
    
        $this->db->set($request_petty); // Use set() method to specify the data to be inserted
        $this->db->insert('petty'); // Call insert() method to perform the insertion
    }

    function create_pettyvoucher($petty_id)
    {

        $data = array(
            'petty_reference_number' => $this->input->post('petty_reference_number'),
            'petty_date' => $this->input->post('petty_date'),
            'petty_requester' => $this->input->post('petty_requester'),
            'petty_company' => $this->input->post('petty_company'),
            'petty_category' => $this->input->post('petty_category'),
            'petty_purpose' => $this->input->post('petty_purpose'),
            'petty_amount' => $this->input->post('petty_amount'),
            'petty_voucher_no' => $this->input->post('petty_voucher_no'),
            'petty_payment_by' => $this->input->post('petty_payment_by'),
            'petty_nature_of_payment' => $this->input->post('petty_nature_of_payment'),
            'petty_voucher_details' => $this->input->post('petty_voucher_details'),
            'petty_acc_no' => $this->input->post('petty_acc_no'),
            'petty_description' => $this->input->post('petty_description'),
            'petty_tax' => $this->input->post('petty_tax'),
            'petty_amount_rm' => $this->input->post('petty_amount_rm'),
            'petty_remarks' => $this->input->post('petty_remarks')
        );

        $this->db->insert('pettyvoucher', $data);
        return $this->db->insert_pvoucherid();
    }
    


    

    


}