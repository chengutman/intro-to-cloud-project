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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome page</title>
</head>

<body>
    <div class="welcome-page-container">
        <div class="welcome-page-top-left">
            <div class="welcome-page-top-left-container">
                <h1>Welcome</h1>
                <h2>to PartyApp</h2>
                <p>Your One Destination For Planning Your Perfect Party</p>
                <div class="btn-container">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Sign In</button>
                    <button type="button" class="btn btn-primary"><a href = "create-account.php">Create An Account</a></button>
                </div>
            </div>
        </div>
        <div class="welcome-page-top-right">
            <div class="welcome-page-top-right-container">
                <img src="./images/dancingv2.png">
            </div>
        </div>

        <div class="explore-button">
            <a href="#explore">EXPLORE</a>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Login to your account</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                <form action ="./includes/signin.inc.php" method="POST">
                        <div class="form-group">
                            <label for="inputEmail1">Email address</label>
                            <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" name="useremail" placeholder="Enter email" required="true">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1">Password</label>
                            <input type="password" class="form-control" id="inputPassword1" name="userpw" placeholder="Password" required="true">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="explore-container" id="explore">
        <div class="explore-left">
                <h3>About Us</h3>
                <div class="explore-left-container">
                        <p>Party planing just got easier!
                            with partyApp you can plan a party for any occasion 
                            select food and drink services on demand, choose your guest list 
                            and many more features that will make your party planning experience better than before </p>
                </div>
        </div>
        <div class ="val"></div>
        <div class="explore-right">
                <h4>Services</h4>
            <div class="explore-right-container">
                <div class="feature">
                       <img class="feature-image" src="./images/welcomePage/checklist.png">
                       <p class="feature-caption">Select a Category & Theme</p>
                </div>
                <div class="feature">
                        <img class="feature-image" src="./images/welcomePage/location.png">
                        <p class="feature-caption">Select a Location</p>
               </div>
                <div class="feature">
                        <img class="feature-image" src="./images/welcomePage/guest-list.png">
                        <p class="feature-caption">Subbmit your Guest-List</p>
                    </div>
                 <div class="feature">
                    <img class="feature-image" src="./images/welcomePage/tray.png">
                    <p class="feature-caption">Select the Catering option</p>
                </div>
                <div class="feature">
                    <img class="feature-image" src="./images/welcomePage/cocktail.png">
                    <p class="feature-caption">Select the Drinks option</p>
                </div>
                <div class="feature">
                        <img class="feature-image" src="./images/welcomePage/dancing.png">
                        <p class="feature-caption">Have fun and Dance!</p>
                </div>


            </div>


        </div>
        <script src="./script./script.js"></script>
</body>

</html>