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

       $sqlCreateFood = "INSERT INTO tb_users_204_food(dpID,foodType)
       VALUES('$details','list');";

mysqli_query($connection, $sqlCreateFood);

$sqlselect = "SELECT * FROM tb_users_204_food WHERE dpID = '$details';";
$selectResult = mysqli_query($connection,$sqlselect);
$row = mysqli_fetch_assoc($selectResult);
$fid = $row['foodID'];
$foodItemArray = $_POST['inputfood'];
$foodGuestList = $_POST['guestListfood'];
echo($foodItem)
if(empty($foodGuestList)) 
  {

  } 
  else 
  {
    $numberOfFoodItem = count($foodItemArray);
    for($i=0; $i < $numberOfFoodItem; $i++)
    {
        $gID = $foodGuestList[$i];
        $fd = $foodItemArray[$i];
        $sqlinsert = "INSERT INTO tb_users_204_fooditem(fID,gID,fidescription)
        VALUES ('$fid','$gID','$fd');";
        mysqli_query($connection,$sqlinsert);
    }
  }
  ?>
