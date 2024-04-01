<?php

function callsideMenu() {

    $CI = & get_instance();
    //$CI->load->helper('cookie');   
    $usId = get_cookie('_userID');



    $query = $CI->db
            ->where('menu_par', '0')
            ->get('Menu');


    foreach ($query->result() as $row) {
        echo "<li>" . $row->menu_name;
    }
}

function callsideMenuChild() {

    $CI = & get_instance();
    //$CI->load->helper('cookie');   
    $usId = get_cookie('_userID');



    $query = $CI->db->get('Menu');


    foreach ($query->result() as $row) {
        echo "<li>" . $row->menu_name;
    }
}

function getData($required, $table, $column, $cond_id) {

    $CI = & get_instance();
    if ($column != "")
        $CI->db->where($column, $cond_id);
    $result = $CI->db->get($table);
    $row = $result->result();
    //  echo $CI->db->last_query(); exit;
    return $row[0]->$required;
}

function getDataArr($required, $table, $cond, $column = '') {

    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }
    $result = $CI->db->select($required)
            ->get($table);
    $row = $result->result();

    // echo $CI->db->last_query();
    

    if ($column)
        return $row[0]->$column;
    else
        return $row[0]->$required;
}

function getDataResult($table, $cond, $like, $order) {

    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);


    $row = $result->result();
    // echo $CI->db->last_query();exit;
    return $row;
}

function getDataResult2($table, $cond, $like) {

    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->get($table);



    $row = $result->result();
    // print_r($row);exit;
    // echo $CI->db->last_query();exit;
    return $row;
}

function getDataResultSQL($sql) {

    $CI = & get_instance();
    $result = $CI->db->query($sql);

    $row = $result->result();

    return $row;
}

function getDataArray($table, $cond, $like) {

    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->get($table);


    $row = $result->row();
    // echo $CI->db->last_query();exit;

    return $row;
}

function getData4Listbox($table, $cond, $like, $order, $idr, $valr) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr;
    }

    return $data;
}


function getData4List($table, $cond, $like, $order, $idr, $valr) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr;
    }

    return $data;
}

function getData4ListboxScope($table, $cond, $like, $order, $idr, $valr, $valr2) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr2." - ".$dt->$valr;
    }

    return $data;
}

function getData4ListboxJalan($table, $cond, $like, $order, $idr, $valr, $valr2, $valr3) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr.", ".convertCurrency($dt->$valr3)." KM, ".getData("lkj_description","lkp_kategori_jalan","lkj_id",$dt->$valr2);
    }

    return $data;
}

function getData4ListboxItem($table, $cond, $like, $order, $idr, $valr, $valr2) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr." (".getData("uom_code","lkp_uom","uom_id",$dt->$valr2).")";
    }

    return $data;
}

function getData4ListboxIllness($table, $cond, $like, $order, $idr, $valr) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr;
    }

    return $data;
}

function getData4ListboxStaff($table, $cond, $like, $order, $idr, $valr, $valr2) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr2." ".$dt->$valr;
    }

    return $data;
}


function getData4ListboxSite($table, $cond, $like, $order, $idr, $valr , $valr2, $valr3) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr2." ".$dt->$valr." - ".$dt->$valr3;
    }

    return $data;
}

function getData4ListboxKS($table, $cond, $like, $order, $idr, $valr, $valr2) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    $data[''] = 'Please choose';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr." ".$dt->$valr2;
    }

    return $data;
}


function getData4ListboxMultiple($table, $cond, $like, $order, $idr, $valr) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr;
    }

    return $data;
}

function getData4ListboxUpdate($table, $cond, $like, $order, $idr, $valr,$valId,$val) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);
//       echo $CI->db->last_query();exit; 
            // echo $valId.$val;exit;/
    $data[$valId] = $val;

    if(!$val)
        $data[''] = 'Please choose';

    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr;
    }

    return $data;
}


function getData4ListboxVal($table, $cond, $like, $order, $idr, $valr) {
    $CI = & get_instance();
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }

    if ($like)
        $CI->db->like($like[0], $like[1]);

    $result = $CI->db->order_by($order[0], $order[1])
            ->get($table);

    $data['0'] = 'Sila Pilih';
    foreach ($result->result() as $dt) {
        //$dr = eval($idr);
        //$val = eval($valr);

        $data[$dt->$idr] = $dt->$valr;
    }

    return $data;
}


function letCount($table, $join = '', $joincond = '', $jointype = '', $cond = '') {
    $CI = & get_instance();
    if ($cond) {
        $i = 0;
        foreach ($cond as $cnd) {
            if (count($cnd) > 1)
                $CI->db->where($cnd[0], $cnd[1]);
            else
                $CI->db->where($cnd[0]);

            //echo count($or);
            if (count($or) > 0) {
                if (count($or[$i]))
                    $CI->db->or_where($or[$i][0], $or[$i][1]);
            }
            $i++;
        }
    }
    if ($join) {
        $CI->db->join($join, $joincond, $jointype);
    }
    $result = $CI->db->from($table)
            ->get();

    // echo $CI->db->last_query();
    return $result->num_rows;
}

function getDataCount($table, $cond = '', $like = '', $or = array()) {
    $CI = & get_instance();


    if ($cond) {
        $i = 0;
        foreach ($cond as $cnd) {
            if (count($cnd) > 1)
                $CI->db->where($cnd[0], $cnd[1]);
            else
                $CI->db->where($cnd[0]);

            //echo count($or);
            if (count($or) > 0) {
                if (count($or[$i]))
                    $CI->db->or_where($or[$i][0], $or[$i][1]);
            }
            $i++;
        }
    }

    if ($like) {
        foreach ($like as $l) {
            $CI->db->like($l[0], $l[1]);
        }
    }

    $result = $CI->db->from($table)
            ->get();

    // echo $CI->db->last_query()."<br/>";
    return $result->num_rows;
}

function getDataCountIcon($table, $cond = '', $like = '', $or = array()) {
    $CI = & get_instance();


    if ($cond) {
        $i = 0;
        foreach ($cond as $cnd) {
            if (count($cnd) > 1)
                $CI->db->where($cnd[0], $cnd[1]);
            else
                $CI->db->where($cnd[0]);

            //echo count($or);
            if (count($or) > 0) {
                if (count($or[$i]))
                    $CI->db->or_where($or[$i][0], $or[$i][1]);
            }
            $i++;
        }
    }

    if ($like) {
        foreach ($like as $l) {
            $CI->db->like($l[0], $l[1]);
        }
    }

    $result = $CI->db->from($table)
            ->get();


    return $result->num_rows;
}

function explodeDate($date, $from, $to) {
    if ($date) {
        $td = explode($from, $date);

        return $td[2] . $to . $td[1] . $to . $td[0];
    }
}


function convertCurrency($amount) {
    return number_format($amount, 2, ".", ",");
}

function convertCurrency3($amount) {
    return number_format($amount, 3, ".", ",");
}

function convertNumber($amount) {
    return number_format($amount, 0, ".", ",");
}

function getTheAge($birth) {
    $today = date("Y");
    $result = $today - $birth;

    return $result;
}



function changeMonth2Malay($month) {
    $malay = array('Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember');
    $english = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');


    $i = 0;
    foreach ($english as $mE) {
        if ($mE == $month)
            return $malay[$i];

        $i++;
    }
}

function noDays($from, $to) {
    $from = date("Y-m-d", strtotime($from));
    $first_date = strtotime($from);
    $second_date = strtotime($to);
    $offset = $second_date - $first_date;
    return floor($offset / 60 / 60 / 24);
}

function insertActivityLog($log,$id=''){

        $CI =& get_instance();



        if(!$id)

            $id = get_cookie('_userID');



        $CI->db->insert("log",array("log_activity"=>$log,"log_datetime"=>date("Y-m-d H:i:s"),"log_uid"=>$id));

        // echo $CI->db->last_query();exit;

    }


    function insertStockLog($qty,$total,$id,$type,$wo_id=""){

        $CI =& get_instance();

        $stock = array(

                    'ls_stock_id'=>$id,
                    'ls_amount'=>$qty,
                    'ls_balance'=>$total,
                    'ls_type'=>$type,
                    'ls_wo_id'=>$wo_id,
                    'ls_updateby'=>get_cookie('_userID'),

                );

        $CI->db->insert("log_stock",$stock);

        // echo $CI->db->last_query();exit;

    }


    function updateClosingStock($product_id,$qty){

        $CI =& get_instance();

        $product = array(

                    'product_qty_closing'=>$qty,
                );

        $CI->db->update("product",$product,array('product_id'=>$product_id));

        // echo $CI->db->last_query();exit;

    }

// function insertuserLog($module, $remarks) {
//     $CI = & get_instance();

//     $act = array(
//         'module_name' => $module,
//         'userid' => get_cookie('_userID'),
//         'remarks' => $remarks,
//         'datet' => date('Y-m-d H:i:s')
//     );
//     $CI->db->insert("user_activity", $act);
// }

// function getUserLog($limit = 10, $offset = 0, $cond = '') {

//     $CI = & get_instance();
//     if ($cond) {
//         foreach ($cond as $c) {
//             if (count($c) > 1)
//                 $CI->db->where($c[0], $c[1]);
//             else
//                 $CI->db->where($c[0]);
//         }
//     }


//     $grab = $CI->db->from("user_activity")
//             ->join("users", "users.user_ID=user_activity.userid", "left")
//             ->limit($limit, $offset)
//             ->offsetcolumn("log_id")
//             ->order_by('datet', 'DESC')
//             ->get();
//     return $grab->result();
// }

function countingDays($the_date) {
    $now = time(); // or your date as well
    $your_date = strtotime($the_date);
    $datediff = $your_date - $now;
    $dated= floor($datediff / (60 * 60 * 24));
    return ($dated+1);
}

function currency_format($amount, $precision = 2, $use_commas = true, $show_currency_symbol = false, $parentheses_for_negative_amounts = false) {
    /*
     * *    An improvement to number_format.  Mainly to get rid of the annoying behaviour of negative zero amounts.    
     */
    $amount = (float) $amount;
    // Get rid of negative zero 
    $zero = round(0, $precision);
    if (round($amount, $precision) == $zero) {
        $amount = $zero;
    }

    if ($use_commas) {
        if ($parentheses_for_negative_amounts && ($amount < 0)) {
            $amount = '(' . number_format(abs($amount), $precision) . ')';
        } else {
            $amount = number_format($amount, $precision);
        }
    } else {
        if ($parentheses_for_negative_amounts && ($amount < 0)) {
            $amount = '(' . round(abs($amount), $precision) . ')';
        } else {
            $amount = round($amount, $precision);
        }
    }

    if ($show_currency_symbol) {
        $amount = '$' . $amount;  // Change this to use the organization's country's symbol in the future 
    }
    return $amount;
}

function getMonthArray() {

    return array("1" => "Januari", "2" => "Febuari", "3" => "Mac", "4" => "April", "5" => "May", "6" => "Jun", "7" => "Julai", "8" => "Ogos", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Disember");
}

function calculateMeritPeruntukkan($rentIC) {

    $CI = & get_instance();

    $pID = array('100', '101', '102', '103');



    $ttlPendapatan = round(getDataArr("total_pendapatan", "renthouse_hubwife", array(array("renthouse_ic", $rentIC))));
    if ($ttlPendapatan == 0)
        $ttlPendapatan = round(getDataArr("pendapatan", "renthouse_applicant", array(array("renthouse_ic", $rentIC))));

    $kecacatan = getDataArr("kecacatan", "renthouse_lengkap", array(array("renthouse_ic", $rentIC)));

    $yearDaftar = getDataArr("dt", "renthouse_applicant", array(array("renthouse_ic", $rentIC)));
    $yearGab = date('Y') - date("Y", strtotime($yearDaftar));

    $ibubapa = getDataCount("renthouse_family", array(array("renthouse_ic", $rentIC), array('hubungan !=', '1')));
    $anak = getDataCount("renthouse_family", array(array("renthouse_ic", $rentIC), array('hubungan', '1')));
    $anak_bil = $ibubapa + $anak;

    $kapita = 0;
    if ($anak_bil)
        $kapita = round($ttlPendapatan / $anak_bil);
    else
        $kapita = round($ttlPendapatan);
    $jumlah = 0;

    foreach ($pID as $pen_id) {

        $marks = 0;
        //Pendapatan Berkapita
        if ($pen_id == 100) {
            $marks = getDataArr("mata", "lkp_penilaian", array(array('max >=', $kapita), array('min <=', $kapita), array('penilaian_id', $pen_id)));

            if (!$marks)
                $marks = 0;

            //echo "pendapatan $kapita : $marks<br>";
        }

        //Kecacatan
        if ($pen_id == 101) {
            $kecacatan = $kecacatan ? $kecacatan : 0;
            $marks = getDataArr("mata", "lkp_penilaian", array(array('min <=', $kecacatan), array('penilaian_id', $pen_id)));
            if (!$marks)
                $marks = 0;
            //echo "kecacatan $kecacatan : $marks<br>";
        }

        //Berpenyakit
        if ($pen_id == 102) {
            $kecacatan = $kecacatan ? $kecacatan : 0;
            $marks = getDataArr("mata", "lkp_penilaian", array(array('min <=', $kecacatan), array('penilaian_id', $pen_id)));
            if (!$marks)
                $marks = 0;
            //echo "penyakit $kecacatan : $marks<br>";
        }

        //tempoh mendaftar
        if ($pen_id == 103) {
            $marks = getDataArr("mata", "lkp_penilaian", array(array('min <=', $yearGab), array('max >=', $yearGab), array('penilaian_id', $pen_id)));
            if (!$marks)
                $marks = 0;
            //echo "year gab $yearGab (".date('Y')." ".date("Y",strtotime($yearDaftar)).") : $marks<br>";
        }



        $jumlah +=$marks;
    }



    return $jumlah;
}

function getParlimen($ugroup) {
    if ($ugroup == '59' || $ugroup == '70')
        return '3'; // bukit bintang
    elseif ($ugroup == '60' || $ugroup == '71')
        return '4'; // cheras
    elseif ($ugroup == '61' || $ugroup == '72')
        return '7'; // segambut
    elseif ($ugroup == '62' || $ugroup == '73')
        return '8'; //seputeh
    elseif ($ugroup == '63' || $ugroup == '74')
        return '5'; //kepong
    elseif ($ugroup == '64' || $ugroup == '75')
        return '6'; // Lembah Pantai
    elseif ($ugroup == '65' || $ugroup == '76')
        return '1'; // Bandar Tun Razak
    elseif ($ugroup == '66' || $ugroup == '77')
        return '9'; // Setiawangsa
    elseif ($ugroup == '67' || $ugroup == '78')
        return '10'; //Titiwangsa
    elseif ($ugroup == '68' || $ugroup == '79')
        return '2'; // Batu
    elseif ($ugroup == '69' || $ugroup == '80')
        return '11'; // Wangsa Maju
}


function getDataCounting($required, $table, $cond) {

    $CI = & get_instance();
    $CI->db->select($required);
    foreach ($cond as $cnd) {
        $CI->db->where($cnd[0], $cnd[1]);
    }
    $result = $CI->db->get($table);
    $row = $result->result();
    // echo $CI->db->last_query();
    return $row[0];
}

function romanic_number($integer, $upcase = true) 
{ 
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
    $return = ''; 
    while($integer > 0) 
    { 
        foreach($table as $rom=>$arb) 
        { 
            if($integer >= $arb) 
            { 
                $integer -= $arb; 
                $return .= $rom; 
                break; 
            } 
        } 
    } 

    return $return; 
} 

//$date = date('Y-m-d', strtotime('+1 month', strtotime('2015-01-01')));

function sendMail($to, $subject, $message) {
    $CI = & get_instance();
    // enable this on live
    $config = array(
        'protocol' => strtolower("mail"),//tukar to smtp at live
        'smtp_host' => "mail.semesta.com.my",
        'smtp_port' => "25",
        'smtp_user' => "shahranie@semesta.com.my", // change it to yours
        'smtp_pass' => "shahranie123219", // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );


    //print_r($config);exit;                        
    $CI->load->library('email', $config);
    $CI->email->clear();

    $CI->email->set_newline("\r\n");
    $CI->email->set_crlf("\r\n");
    $CI->email->from('stms@semesta.com.my', 'STMS Notification'); // change it to yours
    $CI->email->to($to); // change it to yours
    $CI->email->bcc('shahranie@semesta.com.my'); 
    $CI->email->subject($subject);
    $CI->email->message($message);
    if (!$CI->email->send()) {
        return $CI->email->print_debugger();
    }

    return "";
}

function getRunningNo($compid,$deptid,$type){
    if($type == 1)
        $running = getDataCount("purchase",array(array("pr_req_comp",$compid),array("pr_req_dept",$deptid),array("pr_type",$type)));
    else
        $running = getDataCount("purchase",array(array("pr_req_comp",$compid),array("pr_type",$type)));
    // echo "|".$running."|";exit
    return $running + 1;
}

function generateNoPr($compid,$deptid,$rev,$type){
    // echo $compid."|".$deptid."|".$rev."|".$type;
    $comp=getData("co_code","company","co_id",$compid);
    $dept=getData("department_code","department","department_id",$deptid);
    // $rev="0";
    
    // $running = getRunningNo($compid,$deptid,$type);

    $curyear=date("Y");
    $curmonth=date("m");

    if($type == 1)
        $depttt = strtoupper($dept);
    elseif($type == 2)
        $depttt = "STA";
    else
        $depttt = "TRF";

    //afiq
        $noX=getDataResultSQL("select top 1 * from purchase where pr_req_comp=$compid and pr_req_dept=$deptid and pr_type=$type order by pr_no desc");
        // echo $this->db->last_query();exit;
        foreach ($noX as $key) 
        {
            $kawasanID = explode("-", $key->pr_no);
            $running=$kawasanID[4]+1;
        }      
    //
    $no = str_pad($running, 6, "0",STR_PAD_LEFT);


    return strtoupper($comp)."-".$depttt."-".$curyear."-".$curmonth."-".$no."-".$rev;exit;

}

function generateNoPrRev($compid,$deptid,$rev,$type,$no){
    // echo $compid."|".$deptid."|".$rev."|".$type."|".$no;exit();
    $comp=getData("co_code","company","co_id",$compid);
    $dept=getData("department_code","department","department_id",$deptid);
    // $rev="0";
    
    $curyear=date("Y");
    $curmonth=date("m");

    if($type == 3)
        $pr_no = strtoupper($comp)."-TRF-".$curyear."-".$curmonth."-".$no."-".$rev;
    elseif($type == 2)
        $pr_no = strtoupper($comp)."-STA-".$curyear."-".$curmonth."-".$no."-".$rev;
    else
        $pr_no = strtoupper($comp)."-".strtoupper($dept)."-".$curyear."-".$curmonth."-".$no."-".$rev;

    return $pr_no;exit;

}


function generateTempNoPr(){


$running=getData("prn_no","pr_running_no","prn_type","TPR");

$run_no=$running;
$prn_no=$run_no+1;

$no=str_pad($run_no, 4, "0",STR_PAD_LEFT);

    $CI = & get_instance();

    $prn = array(

        'prn_no' => $prn_no,
        
    );
    $CI->db->update("pr_running_no",$prn,array('prn_type'=>"TPR"));

return "TEMP-PR-".$no;exit;

}


function generatePettyCashNo(){


    $running=getData("prn_no","pr_running_no","prn_type","TPR");
    
    $run_no=$running;
    $prn_no=$run_no+1;
    
    $no=str_pad($run_no, 4, "0",STR_PAD_LEFT);
    
        $CI = & get_instance();
    
        $prn = array(
    
            'prn_no' => $prn_no,
            
        );
        $CI->db->update("pr_running_no",$prn,array('prn_type'=>"TPR"));
    
    return "TEMP-PR-".$no;exit;
    
    }



function insertuserLog($remarks) {
    $CI = & get_instance();

    $act = array(

        'log_user' => $this->session->userdata("uId"),
        'log_description' => $remarks,
        'log_date' => date('Y-m-d')
    );
    $CI->db->insert("lkp_log", $act);
}

function getUserLog($limit = 10, $offset = 0, $cond = '') {

    $CI = & get_instance();
    if ($cond) {
        foreach ($cond as $c) {
            if (count($c) > 1)
                $CI->db->where($c[0], $c[1]);
            else
                $CI->db->where($c[0]);
        }
    }


    $grab = $CI->db->from("lkp_log")
            ->join("users", "users.user_ID=lkp_log.log_id", "left")
            ->limit($limit, $offset)
            ->offsetcolumn("log_id")
            ->order_by('log_date', 'DESC')
            ->get();
    return $grab->result();
}


function insertRequestor($name,$email,$comp,$cu='',$dept='',$position='',$phone='',$passport='',$dept2='',$jobno='',$ic='') {
    // print_r($_POST);exit;

    $CI = & get_instance();

    $act = array(
        'req_name'           => $name,
        'req_email'          => $email,
        'req_company'        => $comp
    );

    if($cu) 
        $act['req_corporate_unit'] = $cu;
    if($position) 
        $act['req_position'] = $position;
    if($phone) 
        $act['req_phone'] = $phone;
    if($passport) 
        $act['req_passport_no'] = $passport;
    if($dept) 
        $act['req_department'] = $dept;
    if($jobno) 
        $act['req_jobno'] = $jobno;
    if($ic) 
        $act['req_ic'] = $ic;

    // print_r($act);exit;
    // $CI->db->insert("requestor", $act);

    if(getDataCount("requestor",array(array('req_email',$email)))==0){
        //-->Insert applicant
        $CI->db->insert("requestor",$act);
    }else{
        //-->Update applicant
        $CI->db->update("requestor",$act,array('req_email'=>$email));
    }
    // echo $CI->db->last_query();exit;
}

function save_audit_log($log_type,$log_description,$object_id,$object_type,$object_pr_stat){
    $CI = & get_instance();
    
    $lkp_log = array(
        'log_datetime' => date("Y-m-d H:i:s"),
        'log_type' => $log_type,
        'user_ID' => get_cookie('_userID'),
        'log_description' => $log_description,
        'object_id' => $object_id,
        'object_type' => $object_type,
        'object_pr_status' => $object_pr_stat
    );

    $CI->db->insert("lkp_log",$lkp_log);
}

function save_log($description,$pr_id,$pr_status){
    $CI = & get_instance();
    
    $count = getDataCount("lkp_log",array(array("pr_id",$pr_id)));
    
    $lkp_log = array(
        'log_datetime' => date("Y-m-d H:i:s"),
        'user_ID' => get_cookie('_userID'),
        'log_description' => $description,
        'pr_id' => $pr_id,
        'pr_stat' => $pr_status,
        'log_step' => $count + 1
    );

    $CI->db->insert("lkp_log",$lkp_log);
    // $this->db->last_query();exit;
}

function mailJobInHand($mail,$name,$module,$stat=0,$pr_id){
    
    // $subject = "PURCHASE REQUISITION APPLICATION";
    $pr_no = getData("pr_no","purchase","pr_id",$pr_id);
    $date_created = getData("pr_date_created","purchase","pr_id",$pr_id);
    $type = getData("pr_type","purchase","pr_id",$pr_id);
    $title = getData("pr_title","purchase","pr_id",$pr_id);

    if($stat == 1) // Asset - Stock Check
        $subject = "PR System : Stock Check Request";
    elseif($stat == 8) // Finance - Budget Check
        $subject = "PR System : Budget Availability Checking Request";
    elseif($stat == 9 || $stat == 10 || $stat == 12 || $stat == 13) // Reviewer/HOD/HBU - Approval
        $subject = "PR System : Approval Request";

    $message = "
    Dear ".ucwords(strtolower($name)).",
    <br/>
    <br/>
    You have received a new job in $module on ".date('d/m/Y').".
    <table width=\"80%\">
    <tr>
    <td width=\"5%\"></td>
    <td width=\"40%\">PR No.</td>
    <td>: <b>$pr_no</b></td>
    </tr>";
    if($type == 1){
        $message.= "<tr>
            <td></td>
            <td>Title</td>
            <td>: <b>$title</b></td>
        </tr>";
    }
    $message.= "<tr>
    <td></td>
    <td>Date Created</td>
    <td>: <b>".date('d/m/Y',strtotime($date_created))."</b></td>
    </tr>
    </table>
    <br/>
    <br/>
    Please click <a href=\"".base_url()."\">HERE</a> and login to Purchase Requisition System to view your Job in hand. If it is not working, copy the link below to your web browser.
    <br/>
    <br/>
    <a href=\"".base_url()."\">".base_url()."</a>
    <br/>
    <br/>
    Thank you.
    <br/>
    <br/>
    Sincerely,
    <br/>
    PR.Notification<br/><br/><br/><br/>
    ";
    // echo $message;exit;
    sendMail($mail, $subject, $message) ;
}

// function mailCreatorRequestor($mail,$name,$pr_no,$date_created,$stat,$count,$remark='',$type=0){
function mailCreatorRequestor($mail,$name,$pr_id,$stat,$remark='',$count=0){
    // echo $count;exit;
    // $creator_mail = getData("user_email","users","user_ID",getData("pr_creator_id","purchase","pr_id",$pr_id));
    // $requestor_email = getData("pr_requestor_email","purchase","pr_id",$pr_id);
    $pr_no = getData("pr_no","purchase","pr_id",$pr_id);
    $date_created = getData("pr_date_created","purchase","pr_id",$pr_id);
    $pr_status = getData("pr_status","purchase","pr_id",$pr_id);
    $type = getData("pr_type","purchase","pr_id",$pr_id);
    $title = getData("pr_title","purchase","pr_id",$pr_id);

    if($stat == 1){
        if($pr_status == 13){
            $status = "REVIEWED";
        }else{
            $status = "APPROVED";
        }
        $ly = "Gladly";
        $subject = "PR System : Your $subsubject has been Approved";
    }else{
        $status = "REJECTED";  
        $ly = "Sadly";
        $subject = "PR System : Your $subsubject has been Rejected";
    } 

    if($count == 1){
    	$is = "is";
    	$s = "";	
    }else{
    	$is = "are";
    	$s = "s";
    } 

    if($type == 1) $subsubject = "Purchase Requisition";
    elseif($type == 2) $subsubject = "Stationery Requisition";
    else $subsubject = "Travel Requisition";

    

    $message = "
    Dear ".ucwords(strtolower($name)).",
    <br/>
    <br/>
    $ly to inform you that your Purchase Requisition application with information below has been <b>$status</b>. 
    <br/>
    <br/>
    <table width=\"80%\">
    <tr>
    <td width=\"5%\"></td>
    <td width=\"40%\">PR No.</td>
    <td>: <b>$pr_no</b></td>
    </tr>";
    if($type == 1){
        $message.= "<tr>
            <td></td>
            <td>Title</td>
            <td>: <b>$title</b></td>
        </tr>";
    }
    $message.= "<tr>
    <td></td>
    <td>Date Created</td>
    <td>: <b>".date('d/m/Y',strtotime($date_created))."</b></td>
    </tr>
    <tr>
    <td></td>
    <td>Application Status</td>
    <td>: <b>$status</b></td>
    </tr>";
    if($stat == 0){
    	$message.= "<tr>
		    <td></td>
		    <td>Remark</td>
		    <td>: <b>$remark</b></td>
	    </tr>";
    }
    $message.= "</table>";
    if($count > 0){
        if($stat == 1){
        	$message.= "<br/>There ".$is." ".$count." item".$s." have been rejected from your application.
        	<br/>";
        }
    }
    $message.= "<br/>
    Please click <a href=\"".base_url()."\">HERE</a>  and login to Purchase Requisition System to view your application. If it is not working, copy the link below to your web browser.
    <br/>
    <br/>
    <a href=\"".base_url()."\">".base_url()."</a>
    <br/>
    <br/>
    Thank you.
    <br/>
    <br/>
    Sincerely,
    <br/>
    PR.Notification<br/><br/><br/><br/>
    ";
    // echo $mail."|".$message;
    sendMail($mail, $subject, $message);
}


function mailDelegation($mail,$name,$user_from,$from,$to){

    // echo $from." to ".$to;exit();

    $subject = "PURCHASE REQUISITION APPLICATION";

    $message = "
    Dear ".ucwords(strtolower($name)).",
    <br/>
    <br/><strong>"
    .ucwords(strtolower($user_from))."</strong> has assign you to APPROVE PR on behalf of him/her from <strong>".$from."</strong> to <strong>".$to."</strong>
    <br/>
    <br/>
    Please click <a href=\"".base_url()."\">HERE</a> and login to Purchase Requisition System to view the PR. If it is not working, copy the link below to your web browser.
    <br/>
    <br/>
    <a href=\"".base_url()."\">".base_url()."</a>
    <br/>
    <br/>
    Thank you.
    <br/>
    <br/>
    Sincerely,
    <br/>
    PR.Notification<br/><br/><br/><br/>
    ";


    
    sendMail($mail, $subject, $message);
}

function mailForgotPassword($mail,$name,$random){


    $subject = "STMS : Forgot Password";

    $message = "
    Dear ".ucwords(strtolower($name)).",
    <br/>
    <br/>
    Your temporary password is : <strong>".$random."</strong>
    <br/>
    <br/>
    Please click <a href=\"".base_url()."\">HERE</a> and login to STMS : Lembaga Zakat Selangor to change your password. If it is not working, copy the link below to your web browser.
    <br/>
    <br/>
    <a href=\"".base_url()."\">".base_url()."</a>
    <br/>
    <br/>
    Thank you.
    <br/>
    <br/>
    Sincerely,
    <br/>
    STMS.Notification<br/><br/><br/><br/>
    ";


    
    sendMail($mail, $subject, $message);
}

function mailNewUser($mail,$name,$random){


    $subject = "STMS : New User";

    $message = "
    Dear ".ucwords(strtolower($name)).",
    <br/>
    <br/>
    Congratulations, you have been registered as a user Staff Tracking Management System : Lembaga Zakat Selangor.
    <br/>
    <br/>
    Your temporary password is : <strong>".$random."</strong>
    <br/>
    <br/>
    Please change your password after first log in.
    <br/>
    <br/>
    Kindly keep the user account confidential and do not share it with others.
    <br/>
    <br/>
    Please click <a href=\"".base_url()."\">HERE</a> and login to STMS : Lembaga Zakat Selangor. If it is not working, copy the link below to your web browser.
    <br/>
    <br/>
    <a href=\"".base_url()."\">".base_url()."</a>
    <br/>
    <br/>
    Thank you.
    <br/>
    <br/>
    Sincerely,
    <br/>
    STMS.Notification<br/><br/><br/><br/>
    ";


    
    sendMail($mail, $subject, $message);
}


function mailbuyer($name,$mail,$pr_id){
    $pr_no = getData("pr_no","purchase","pr_id",$pr_id);
    $date_created = getData("pr_date_created","purchase","pr_id",$pr_id);
    // $stat = getData("pr_status","purchase","pr_id",$pr_id);
    $type = getData("pr_type","purchase","pr_id",$pr_id);
    $title = getData("pr_title","purchase","pr_id",$pr_id);

    $subject = "PR System : Item Purchase";

    $message = "
    Dear $name,
    <br/><br/>
    You have been assign to purchase item(s) for Purchase Requisition. 
    <table width=\"80%\">
    <tr>
    <td width=\"5%\"></td>
    <td width=\"40%\">PR No.</td>
    <td>: <b>$pr_no</b></td>
    </tr>";
    if($type == 1){
        $message.= "<tr>
            <td></td>
            <td>Title</td>
            <td>: <b>$title</b></td>
        </tr>";
    }
    $message.= "<tr>
    <td></td>
    <td>Date Created</td>
    <td>: <b>".date('d/m/Y',strtotime($date_created))."</b></td>
    </tr>";
    $message.= "</table>
    <br/>
    <br/>
    Please click <a href=\"".base_url()."\">HERE</a> and login to Purchase Requisition System to view the PR. If it is not working, copy the link below to your web browser.
    <br/>
    <br/>
    <a href=\"".base_url()."\">".base_url()."</a>
    <br/>
    <br/>
    Thank you.
    <br/>
    <br/>
    Sincerely,
    <br/>
    PR.Notification<br/><br/><br/><br/>";
    
    // echo $mail."|".$subject."|".$message;exit;
    sendMail($mail, $subject, $message);
}


function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function updateStatus($id,$status){

        $CI =& get_instance();

        $status = array(

                    'g_status'=>$status,
                );

        $CI->db->update("general_info",$status,array('g_id'=>$id));

        // echo $CI->db->last_query();exit;

    }

?>