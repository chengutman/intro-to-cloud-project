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

       $sqlCreateFood = "INSERT INTO tb_users_204_drink(dpID,drinkType)
       VALUES('$details','list');";

mysqli_query($connection, $sqlCreateFood);

$sqlselect = "SELECT * FROM tb_users_204_drink WHERE dpID = '$details';";
$selectResult = mysqli_query($connection,$sqlselect);
$row = mysqli_fetch_assoc($selectResult);
$did = $row['drinkID'];
$drinkItemArray = $_POST['inputdrinks'];
$drinkGuestList = $_POST['guestListdrinks'];
if(empty($drinkGuestList)) 
  {

  } 
  else 
  {
    $numberOfDrinkItem = count($drinkItemArray);
    for($i=0; $i < $numberOfDrinkItem; $i++)
    {
        $gID = $drinkGuestList[$i];
        $dd = $drinkItemArray[$i];
        $sqlinsert = "INSERT INTO tb_users_204_drinkitem(drID,gID,didescription)
        VALUES ('$did','$gID','$dd');";
        mysqli_query($connection,$sqlinsert);
    }
  }
?>