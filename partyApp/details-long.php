<?php
        session_start();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
        $category = $_SESSION['category'];
        $theme = $_SESSION['theme'];
        $party = $_SESSION['party']; 
        $location =$_SESSION['location'];

        $details = $_SESSION['details'];
?>
<!DOCTYPE html>
<html class="animated fast slideInRight">

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
       
        <title>party details</title>
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
        <div class="right-sidenav location">
                <div class="right-sidenav-heading">
                        <h1 class = "title"><?php echo $firstname."'s". " " . $category ?></h1>
                </div>
        </div>
        <div class="wrapper-final-step-long">
                <div class = "details-long-container">
                <div class = "date-btn">
                                <div class="form-group start-date-input">
                                        <label for="sdt">Start Date and Time:</label>
                                        <input type="datetime-local" class="form-control" id="sdt" value = "">
                                </div>
                                <div class="form-group end-date-input">
                                        <label for="sdt">  End Date:</label>
                                        <input type="date" class="form-control" id="ed" value = "" >
                                </div>
                               
                        </div>
                        <div class = "location-btn">
                                <p class ="details-headings">Location</p>
                                <div class="form-group location-address-input">
                                        <input type="text" name = "address" class="form-control" id="inputAddress" value = "" placeholder = "Location Address">
                                </div>
                               
                        </div>
                        
                        <div class = "food-btn">
                                <p class ="details-headings">Food</p>
                                <button class = "accordion-first">Select Service</button>
                                <button class = "accordion-second">Costumize List</button>
                        </div>
                         <div class = "details food">
                         <button class="glider-prev prev_Btn_4">
                                                <i class="fa fa-chevron-left"></i>
                                        </button>
                                        <button class="glider-next next_Btn_4">
                                                <i class="fa fa-chevron-right"></i>
                                        </button>
                                <div class = "item-container">
                                <div class ="item-s">
                                        <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                </div>
                        </div>
                        <div class = "drinks-btn">
                                <p class ="details-headings">Drinks</p>
                                <button class = "accordion-first">Select Service</button>
                                <button class = "accordion-second">Costumize List</button>
                                
                        </div>
                        <div class = "details drinks">
                        <button class="glider-prev prev_Btn_4">
                                                <i class="fa fa-chevron-left"></i>
                                        </button>
                                        <button class="glider-next next_Btn_4">
                                                <i class="fa fa-chevron-right"></i>
                                        </button>
                                <div class = "item-container">
                                <div class ="item-s">
                                        <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                </div>
                        </div>
                        <div class = "extra-btn">
                                <p class ="details-headings">Extra</p>
                                <button class = "accordion-first">Select Service</button>
                                <button class = "accordion-second">Costumize List</button>
                                
                        </div>
                        <div class = "details extra">
                        <button class="glider-prev prev_Btn_4">
                                                <i class="fa fa-chevron-left"></i>
                                        </button>
                                        <button class="glider-next next_Btn_4">
                                                <i class="fa fa-chevron-right"></i>
                                        </button>
                                <div class = "item-container">
                                <div class ="item-s">
                                        <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                <div class ="item-s">
                                <img src="">
                                        <p></p>
                                </div>
                                </div>    
                        </div>
                        <div class = "final-sumbit-container"> 
                        <button type="button" class="btn btn-primary final-submit" value = "submit">Submit</button>
                        </div>
                </div>
        </div>
            <!-- The Modal -->
            <div class="modal" id="myModal-services">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" id ="modal-body-id">
                            <img class = "thumb" src =""> 
                            <p class = "service-name"> </p>
                            
                            <a href="" class="website-link" target="_blank">Go to website</a>
                    </div>

                    <!-- Modal footer -->
                         <div class="modal-footer">
                           <button type="submit" class="btn btn-primary" id= "service-submit">Book Now!</button>
                         </div>
                        </form>

                    </div>
                 </div>
        </div>
        <!-- The Modal -->
        <div class="modal list-food" id="myModal-list-food">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                    <input type = "button" class = "add-btn food" value = "+Add Food Item">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                
                    <!-- Modal body -->
                    <form id = "food-form">
                            <div class = "form-header">
                                <p>What to bring:</p>
                                <p>Who brings what</p>
                            </div>
                    <div class="modal-body" id ="modal-body-id-list-food"></div>

                    <!-- Modal footer -->
                         <div class="modal-footer">
                           <button type="submit" class="btn btn-primary list-submit food-submit">Submit</button>
                         </div>
                         </form>
                    </div>
                 </div>
        </div>
        <div class="modal list-drinks" id="myModal-list-drinks">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <input type = "button" class = "add-btn drinks" value = "+Add Drink Item">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form id = "drinks-form">
                    <div class = "form-header">
                                <p>What to bring:</p>
                                <p>Who brings what</p>
                            </div>
                    <div class="modal-body" id ="modal-body-id-list-drinks"></div>
                    <!-- Modal footer -->
                         <div class="modal-footer">
                           <button type="submit" class="btn btn-primary list-submit drinks-submit">Submit</button>
                         </div>
                    </div>
</form>
                 </div>
        </div>
        <div class="modal list-extra" id="myModal-list-extra">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <input type = "button" class = "add-btn extra" value="+Add Extra Item">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class = "form-header">
                                <p>What to bring:</p>
                                <p>Who brings what</p>
                            </div>
                    <div class="modal-body" id ="modal-body-id-list-extra"></div>
                    <!-- Modal footer -->
                         <div class="modal-footer">
                           <button type="submit" class="btn btn-primary list-submit extra-submit">Submit</button>
                         </div>
                    </div>
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