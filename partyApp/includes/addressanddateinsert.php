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
       $location =$_SESSION['location'];

       $name = $_POST['name'];
       $sd = $_POST['sdt'];
       $ed =$_POST['ed'];
       $address =$_POST['address'];
       

       $sqlupdatep = "UPDATE tb_users_204_party SET partySDateTime = '$sd' , partyEDate = '$ed' WHERE partyID = '$party';";
       mysqli_query($connection,$sqlupdatep);


       $sqlupdated = "UPDATE tb_users_204_details SET lactionName = '$location' , loactionAddress = '$address' WHERE detailsID = '$details';";
       mysqli_query($connection,$sqlupdated);

?>