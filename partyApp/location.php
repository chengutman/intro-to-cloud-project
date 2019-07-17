<?php
        session_start();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
        $category = $_SESSION['category'];
        $theme = $_SESSION['theme'];
?>
<!DOCTYPE html>
<html class="animated fast slideInRight">

<head>
        <link rel="stylesheet" type="text/css" href="./stylesheet/style.css" />
        <link rel="stylesheet/less" type="text/css" href="./stylesheet/animate.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    
        <title>Location</title>
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
        <div class="right-sidenav location">
                <div class="right-sidenav-heading">
                        <h1 class = "title">LOCATION</h1>
                </div>
        </div>
        <div class="wrapper-planning">
                <div class="choose-layout">
                        <div class="item">
                                <img class="image" src="./images/location/l_1.png">
                                <p class="caption">Outside</p>
                        </div>

                        <div class="item">
                                <img class="image" src="./images/location/l_2.png">
                                <p class="caption">Resturant</p>
                        </div>

                        <div class="item">
                                <img class="image" src="./images/location/l_3.png">
                                <p class="caption">Rent</p>
                        </div>
                        <div class="item">
                                <img class="image" src="./images/location/l_4.png">
                                <p class="caption">Club</p>
                        </div>
                        <div class="item">
                                <img class="image" src="./images/location/l_5.png">
                                <p class="caption">Home</p>
                        </div>
                        <div class="item">
                                <img class="image" src="./images/location/l_6.png">
                                <p class="caption">Other</p>
                        </div>
                </div>
        </div>
        <aside class="next-sidenav">
                <div class="next-heading">
                <form action ="./includes/choises.inc.php" method="POST">
                        <input type="hidden" id="chosen" name="chosenL" value="">
                        <input type="submit" value="NEXT">
                </form>
                </div>
        </aside>
        <script src="./script/script.js"></script>
</body>

</html>