<?php
    require_once 'model/ContactDAO.php';

    $contactDAO = new ContactDAO();
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact = new Contact();
        $contact->username=$username;
        $contact->email=$email;
        $contactDAO->addContact($contact);
        header('Location: home.php');
        exit;        
    }
    $contacts=$contactDAO->getContacts();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CS 2033 | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    

    <!-- Image and text -->
    <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px">
    <a class="navbar-brand" href="#">
        <img src="images/lion.png" width="12%" height="12%" class="d-inline-block align-middle" alt="">
        CS 2033 Web Systems
    </a>
    </nav>
    <div class="container">
    <div class="row">
        <div class="col-sm-8">
            <table class="table table-bordered table-striped">
                <thead><tr><th>Contact ID</th><th>User Name</th><th>Email</th></tr></thead>
                <tbody>
                    <?php
                        for($index=0;$index<count($contacts);$index++){
                            echo "<tr><td>".$contacts[$index]->contactID."</td><td>"
                                    .$contacts[$index]->username."</td><td>"
                                    .$contacts[$index]->email."</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>       
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Mailing List</h5>
                    <p class="card-text">Add a new contact to the list.</p>
                    <form action="index.php" method="POST">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Username" required>
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your Email Address" required>
                        <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                    </form>
                </div>
            </div>      
        </div>
        </div>
 
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>