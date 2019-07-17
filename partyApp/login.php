<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./stylesheet/style.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login</title>
</head>

<body>
        <div class="signup-page">
        <div class = "signup-heading">
        <h1>Login to Your Account</h1>
        </div>
        <div class = "signup-page-container">
                
        <form action ="./includes/signin.inc.php" method="POST">
  <div class="form-group">
    <label for="inputEmail1">Email address</label>
    <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp"  name="useremail" placeholder="Enter email" required="true">
  </div>
  <div class="form-group">
    <label for="inputPassword1">Password</label>
    <input type="password" class="form-control" id="inputPassword1"  name="userpw" placeholder="Password" required="true">
  </div>
<div class = "signup-submit-container">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  <p class="register">Not registered?<a href = "create-account.php">Create a new account</a><p>

</form>

 
</div>
<?php
if($_SERVER['QUERY_STRING']){
  if($_SERVER['QUERY_STRING'] == 'signin=wrongemail')
  echo '<div class = "error-messege"><p>Can not find E-mail in the system <br> Please try again</p></div>';
  else{
    echo '<div class = "error-messege"><p>Invalid password <br> Please try again</p></div>';
  }
}
?>

        </div>
                <script src="./script/script.js"></script>
</body>

</html>