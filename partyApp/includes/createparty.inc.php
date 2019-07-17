<?php
include_once 'dbh.inc.php';
session_start();
$id = $_SESSION['id'];
$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$category = $_SESSION['category'];
$theme = $_SESSION['theme'];
$location =$_SESSION['location'];


// create a new party with the details we collected till the current stage
$sqlinsert = "INSERT INTO tb_users_204_party(userID,pCategory,pTheme,pLocation)
VALUES ('$id','$category','$theme','$location');";
mysqli_query($connection,$sqlinsert);
//get the party ID of the party we just created
$sqlselect = "SELECT * FROM tb_users_204_party WHERE userID = '$id' ORDER BY partyID DESC;";
$selectResult = mysqli_query($connection,$sqlselect);
$row = mysqli_fetch_assoc($selectResult);
$_SESSION['party'] = $row['partyID'];
$currPartyID = $_SESSION['party'];

// create guest list 
$guestsArray = $_POST['guest'];
if(empty($guestsArray)) 
  {
    header("Location:../guest-form.php?guests=empty");
    // ADD ALERT ID DID NOT CHECK ANY THING
  } 
  else 
  {
    $numberOfGuests = count($guestsArray);
    for($i=0; $i < $numberOfGuests; $i++)
    {
        $gNameArray = str_word_count($guestsArray[$i], 1);
        $gfirst = $gNameArray[0];
        $glast = $gNameArray[1];
        $sqlinsert = "INSERT INTO tb_users_204_guest(pID,gfname,glname)
        VALUES ('$currPartyID','$gfirst','$glast');";
        mysqli_query($connection,$sqlinsert);
    }
  }
  $sqlNewD = "INSERT INTO tb_users_204_details(pID)
            VALUES ('$currPartyID');";
mysqli_query($connection,$sqlNewD);

$sqlselect = "SELECT * FROM tb_users_204_details WHERE pID = '$currPartyID';";
$selectResult = mysqli_query($connection,$sqlselect);
$row = mysqli_fetch_assoc($selectResult);
$_SESSION['details'] = $row['detailsID'];

if($location == 'Resturant' || $location == 'Club'){
  //header("Location:../details-short.php?party=created?loc=".$location);
}
else{
  header("Location:../details-long.php?party=created?loc=".$location);
}
?>

