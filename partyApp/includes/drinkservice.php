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
       $tel = $_POST['Tel'];
       $sqlCreateDrinks = "INSERT INTO tb_users_204_drink(dpID,drinkType)
                            VALUES('$details','service');";

        mysqli_query($connection, $sqlCreateDrinks);

    $sqlselect = "SELECT * FROM tb_users_204_drink WHERE dpID = '$details';";
    $selectResult = mysqli_query($connection,$sqlselect);
    $row = mysqli_fetch_assoc($selectResult);
    $did = $row['drinkID'];
   $sqlNewDrinksService = "INSERT INTO tb_users_204_drinkservice(drID,dsName,dsPhone)
                        VALUE('$did','$name','$tel');";

    mysqli_query($connection, $sqlNewDrinksService);

    
?>
