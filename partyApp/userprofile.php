<?php
session_start();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
        include_once './includes/dbh.inc.php';
        $sqlselect = "SELECT * FROM tb_user_204_users WHERE id = '$id';";
        $selectResult = mysqli_query($connection,$sqlselect);
        $row = mysqli_fetch_assoc($selectResult);
        $email=$row['email'];
        $gender =$row['gender'];
        if($gender=='male'){
         $gimg = 'src = "./images/gender/male.png"';
        }
        else{
          $gimg ='src = "./images/gender/female.png"';
        }
?>
<!DOCTYPE html>
<html class="animated fast slideInRight ">

<head>
<head>
    <link rel="stylesheet" type="text/css" href="./stylesheet/style.css" />
    <link rel="stylesheet/less" type="text/css" href="./stylesheet/animate.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <title>My Profile</title>
</head>
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
        </div>

    </header>
        <div class="right-sidenav userprofile">
                <div class="right-sidenav-heading">
                        <h1>MY PROFILE</h1>
                </div>
        </div>
        <div class="wrapper-my-profile">
                <div class = "my-profile-heading">
                        <img class = "gender-img" <?php echo $gimg; ?>>
                        <h2><?php echo $firstname. " " . $lastname;?></h2>
                </div>
                <div class ="user-information">
                <form class ="user-email-pw" action ="./includes/changeuserinfo.php " method="POST">
                        <div class="form-group">
                                <label for="inputEmail1">Email address</label>
                                <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp"  name="useremail" placeholder=<?php echo $email?>>
                        </div>
                        <div class="form-group">
                                <label for="inputPassword1">Password</label>
                                <input type="password" class="form-control" id="inputPassword1"  name="userpw" placeholder="Password">
                        </div>
                        <p>*If you would like to change you email or password click on submit</p>
                        <div class ="update-btn-container">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
                </div>
        <script src="./script/script.js"></script>
</body>

</html>