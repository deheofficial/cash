<?php

/**
 * @author lolkittens
 * @copyright 2014
 */

require_once  dirname(__FILE__) ."/Excel/reader.php"; 

class Excel extends Spreadsheet_Excel_Reader { 
    public function __construct() { 
        parent::__construct(); 
    } 
}

?>