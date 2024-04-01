<?php
  
$config = array(
              'protocol' => strtolower("smtp"),
              'smtp_host' => "mail.simpleadvantage.com",
              'smtp_port' => "587",
              'smtp_user' => "razali@simpleadvantage.com", // change it to yours
              'smtp_pass' => "z@li5919", // change it to yours
              'mailtype' => 'html',
              'charset' => 'iso-8859-1',
              'wordwrap' => TRUE
            );

// $config = array(
//               'protocol' => strtolower("smtp"),
//               'smtp_host' => "ssl://smtp.gmail.com",
//               'smtp_port' => "587",
//               'smtp_user' => "notification.testsite@gmail.com", // change it to yours
//               'smtp_pass' => "q1w2e3r$", // change it to yours
//               'mailtype' => 'html',
//               'charset' => 'iso-8859-1',
//               'wordwrap' => TRUE
//             );
 
// $config['mailtype'] = "html";
// $config['charset'] = 'iso-8859-1';
// $config['wordwrap'] = TRUE;

/* End of file email.php */
/* Location: ./system/application/config/email.php */
