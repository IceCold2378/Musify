<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Welcome to Musify. A blog for coding enthusiasts">
    
    <!-- Bootstrap CSS -->
    <title>Musify - Perfect for Music Enthusiasts</title>
</head>
<style>
  .textalign{
    margin-bottom: 10%;
    font-size: 25px;
  }
  .button-link{
    text-decoration: none;
    color: white;
  }
</style>
<body>
  <?php
  if(!isset($_SESSION['status']))
  {
    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
    unset($_SESSION['status']);
  }
  ?>
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Get an Musify Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="code.php" method="post" id="signuppg">
                <div class="form-group">
                  <label for="name">Nickname/Username</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="exampleInputPassword1" required> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword2">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword2" name="exampleInputPassword2" required>
                </div>
                 
                <button type="submit" class="btn btn-primary" name=" button">Create Account</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
        </div>
      </div>
    </div>
  </div>
</body>
</html>


