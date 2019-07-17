<?php session_start();
 $firstname=$_SESSION[ 'firstname']; 
 $lastname=$_SESSION[ 'lastname'];
  $id= $_SESSION[ 'id'];
  $category = $_SESSION['category'];
  $theme = $_SESSION['theme'];
	$location = $_SESSION['location'];
?>
<!DOCTYPE html>
<html class="animated fast slideInRight ">

<head>
    <link rel="stylesheet" type="text/css" href="./stylesheet/style.css" />
	<link rel="stylesheet/less" type="text/css" href="./stylesheet/animate.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Guest List</title>

</head>

<body>
	<header class="header">
    <a href="plan-party.php" class="logo"></a>
        <div class="menu-bar">
            <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="userprofile.php">My Profile</a></li>
                            <li><a href="partys-page.php">My Partys</a></li>
                            <li><a href="plan-party.php">Plan A New Party</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="header-container">
            <div class="icons">
                <i class="fa fa-user"></i>
                <i class="fa fa-bell"></i>
                <div class="search-container">
                    <form class="search_form" action="">
                        <i class="fa fa-search"></i>
                        <input type="text" placeholder="Search.." name="search">
                    </form>
                </div>
            </div>
        </div>

    </header>
	<div class="right-sidenav userprofile">
		<div class="right-sidenav-heading">
			<h1>PARTY DETAILS</h1>
		</div>
	</div>
	<div class="wrapper-guest-form">
            <div class = "guest-input">
				<div class = "guest-input-container">
					<div class = "guest-input-heading-container">
						<h2>Enter Guest</h2>
						<h5>to add to your guest list</h5>
					</div>
					<div class="form-group">
						<div class="form-row">
							<div class="col">
								<label for="inputFirstName">First Name</label>
								<input type="text" class="form-control" name="firstname" placeholder="First name" required="true">
							</div>
							<div class="col">
								<label for="inputLastName">Last Name</label>
								<input type="text" class="form-control" name="lastname" placeholder="Last name" required="true">
							</div>
						</div>
					</div>
					<div class="guest-input-submit-container">
						<button type="button" class="btn btn-primary" id="add-guest">Add To List</button>
                    </div>
                </div>
			</div>
            <div class = "guest-list-from-input">
				<form action ="./includes/createparty.inc.php" method="POST" >
					<div class="guest-form">
					</div>
					<div class="guest-submit-container">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
                </form>
			</div>
</div>
<aside class="guest-right-sidenav">
                <div class="guest-right-sidenav-heading">
                    <p> Guest List</p>
                </div>
</aside>
    <script src="./script/script.js"></script>
</body>

</html>