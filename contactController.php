<?php
    //*****************************************************/
    // Contact Controller
    // Handles HTTP GET and POST Requests
    // GET - Display New Contact Form
    // POST - Process Form and Add Contact to database
    //*****************************************************/
    require_once 'model/ContactDAO.php';

    showErrors(1);

    $nextview = "contactForm.php";
    $contactDAO = new ContactDAO();
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        // Process HTTP POST Request
        // 1. Handle User input from HTTP Request
        $username = $_POST['username'];
	    $email = $_POST['email'];
        // 2. Package Input into a Data Transfer Object(DTO) container
        $contact = new Contact();
        $contact->username=$username;
        $contact->email=$email;
        // 3. Call the Data Access Object(DAO) API Method (Update Model)
        $contactDAO->addContact($contact);
        // 4. Redirect to Next page (View)
        header('Location: '.$nextview);
        exit;        
    }else{
        // Process HTTP GET Request
        // 1. Redirect to View
        header('Location: '.$nextview); 
        exit;  
    }

    function showErrors($debug){
        if($debug==1){
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }

?>
