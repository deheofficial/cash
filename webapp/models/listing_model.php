<?php



class Listing_model extends CI_Model{

    function __construct(){

        parent::__construct();

    }


    function countUsers($like='',$cond=''){

     if($cond)
         {

            foreach($cond as $c)

            {   

                if(count($c)>1)

                $this->db->where($c[0],$c[1]);

                else

                $this->db->where($c[0]);

            }

         }

         

         if($like)

         {

            foreach($like as $l)

            {

                $this->db->like($l[0],$l[1]);

            }

         }





        $sql = $this->db->select("*")

                        ->from("users")

                        // ->join('aircraft','aircraft.aircraft_id = parts.parts_aircraft_id','left')

                        ->get();

        return $sql->num_rows();

    }



    function getAllUsers($limit,$offset,$like='',$cond=''){

     if($cond)

         {

            foreach($cond as $c)

            {   

                if(count($c)>1)

                $this->db->where($c[0],$c[1]);

                else

                $this->db->where($c[0]);

            }

         }

         

         if($like)

         {

            foreach($like as $l)

            {

                $this->db->like($l[0],$l[1]);

            }

         }





        $sql = $this->db->select("*")

                        ->from("users")

                        // ->join('aircraft','aircraft.aircraft_id = parts.parts_aircraft_id','left')

                        ->order_by('users.user_fname', 'ASC')

                        ->offsetcolumn("users.user_id")

                        ->limit($limit,$offset)



                        ->get();

        // echo $this->db->last_query();exit();

        return $sql->result();

    }


   
    
    


}