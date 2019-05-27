<!DOCTYPE html>
<html>
<head>
                        <link rel="stylesheet" type="text/css"
                href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./includes/style1.css" />
	</head>
	<body>
                <header>
                        <div class="logo" onclick="window.location.href='index.html'"></div>
                        <nav>
                                <a href="#">My Profile</a>
                                <a href="#">My Partys</a>
                                <a href="#">Plan A New Party</a>
                                <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
                                        <button onclick="closeLeftMenu()"
                                                class="w3-bar-item w3-button w3-large">&times;</button>
                                        <a href="#" class="w3-bar-item w3-button">My Profile</a>
                                        <a href="#" class="w3-bar-item w3-button">My Partys</a>
                                        <a href="#" class="w3-bar-item w3-button">Plan A New Party</a>
                                </div>
                                <div class="w3-teal">
                                        <button class="w3-button w3-teal w3-xlarge w3-left"
                                                onclick="openLeftMenu()">&#9776;</button>
                                </div>
        
                        </nav>
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
            </header>
        <div id ="layout">
        <div class = "title" id ="category"><h1>Omer's<br> Birthday Party</h1></div>

        <div class ="container" id="party-summary">
              <p>
                Party Date: <?php echo $_GET["pdate"]; ?><br>
                Party Time: <?php echo $_GET["ptime"]; ?><br>
                Number of Guests: <?php echo $_GET["nguests"]; ?><br>
                Category: Bachelorette Party<br>
                Theme: Spa<br>
                Location: Home<br>
                Food: Selcted Cateraing is Taam VeTzeva<br>
                Drinks:<br> Number of soft drinks bottles 10 and Aviel will be asked to bring.
                Number of Alcohol Bottles 5 and Itay will be asked to bring.
              </p>

        </div>
        
        </div>
<footer></footer>
        
<script src="./includes/code.js"></script>
</body>
</html>
