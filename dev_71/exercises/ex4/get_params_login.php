<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="includes/style.css">
    <title>Forms</title>
</head>
<body>
    <section>
        <?php
        $un = $_GET["reg_user_name"];
        $cl = $_GET["reg_color"];

        if ($un== "" || $cl=="")
            echo "invalid user name or color";
        else {
            echo "<h2> Good morning ". $un . "</h2>";
            echo "<h2>". $cl . " is a beatiful color!</h2>";
        }
       ?>
    </section>
</body>
</html>