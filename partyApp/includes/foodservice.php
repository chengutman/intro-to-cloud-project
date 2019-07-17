<?php 
  
       session_start();
       include_once 'dbh.inc.php';
       $firstname = $_SESSION['firstname'];
       $lastname = $_SESSION['lastname'];
       $id = $_SESSION['id'];
       $category = $_SESSION['category'];
       $theme = $_SESSION['theme'];
       $party = $_SESSION['party']; 
       $details = $_SESSION['details'];
       $name = $_POST['name'];
       $sqlCreateFood = "INSERT INTO tb_users_204_food(dpID,foodType)
                            VALUES('$details','service');";

        mysqli_query($connection, $sqlCreateFood);

    $sqlselect = "SELECT * FROM tb_users_204_food WHERE dpID = '$details';";
    $selectResult = mysqli_query($connection,$sqlselect);
    $row = mysqli_fetch_assoc($selectResult);
    $fid = $row['foodID'];
   $sqlNewFoodService = "INSERT INTO tb_users_204_foodservice(fID,fsName)
                        VALUE('$fid','$name');";

    mysqli_query($connection, $sqlNewFoodService);
?>