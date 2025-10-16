<?php
    require_once 'model/ContactDAO.php';

    //************************
    //*  Contoller Template  *
    //************************
    showErrors(0);  //1 - Turn on Error Display

    //**  CONTROLLER Outline  **

    // 1. Retrieve HTTP Name=Value Pairs
    // 2. Interact with MODEL using
    //    - Data Transfer Objects(Containers)
    //      - Object -> One Row of Data in a Table
    //      - Objects[] -> An array of Objects (Multiple Rows from Table)
    // 3. Select Next VIEW 
    //    - GET Request - Use INCLUDE
    //    - POST Request - use HEADER (Redirect)
    
   

    function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
?>