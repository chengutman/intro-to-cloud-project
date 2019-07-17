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
       
       $sqlCheckFood = "SELECT * FROM tb_users_204_food WHERE dpID = '$details';";
      
      $foodResult =  mysqli_query($connection,$sqlCheckFood);
      $foodResultCheck = mysqli_num_rows($foodResult);

      $sqlCheckDrinks = "SELECT * FROM tb_users_204_drink WHERE dpID = '$details';";
      
      $drinksResult =  mysqli_query($connection,$sqlCheckDrinks);
      $drinksResultCheck = mysqli_num_rows($drinksResult);

      $data = array('food'=> $foodResultCheck ,"drinks" =>  $drinksResultCheck);

      echo json_encode($data);
      ?>