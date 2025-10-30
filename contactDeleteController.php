<?php
    require_once 'model/ContactDAO.php';
    require_once 'controller/Controller.php';

    // class contactDeleteController extends Controller{
    //     public function get(){

    //     $contactID = $_GET['contactID'];
    //     $contactDAO = new ContactDAO();
    //     $contactDAO->deleteContact($contactID);

    //     include "views/contactConfirm-view.php";

    //     }

    //     public function post(){

    //         $submit = $_POST['submit'];
    //         if($submit == 'Confirm)'){
    //             $contactID = $_POST['contactID'];
    //             $contactDAO = new ContactDAO();
    //             $contactDSO -> deleteContact($contactID);
    //         }

    //     }
    // }

    //************************
    //*  Contoller Template  *
    //************************
    showErrors(0);  //1 - Turn on Error Display

    $method=$_SERVER['REQUEST_METHOD'];
    // * Process HTTP GET Request
    if($method=='GET'){
        $contactID = $_GET['contactID'];
        $contactDAO = new ContactDAO();
        $contactDAO->deleteContact($contactID);

        header("Location: contactListController.php");
        exit;
    }
    
    // * Process HTTP POST Request
    if($method=='POST'){
        $submit = $_POST['submit'];
        if($submit == 'Confirm)'){
            $contactID = $_POST['contactID'];
            $contactDAO = new ContactDAO();
            $contactDSO -> deleteContact($contactID);
        }
    }
   

    function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
?>