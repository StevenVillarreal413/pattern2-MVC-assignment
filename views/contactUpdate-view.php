<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSCE 20303 | Update Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar bg-body-tertiary mb-5">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="images/logo.png" height="40%" width="40%" alt="UAFS">
            </a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Update Contact</strong></h5>
                        <form action="contactUpdateController.php" method="POST">
                            <input type="hidden" name="contactID" value="<?php $contact->contactID ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" 
                                       value="<?php echo $contact->username ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo $contact->email ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="home-controller.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
