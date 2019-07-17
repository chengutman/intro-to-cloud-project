<?php
include_once 'dbh.inc.php';
session_start();
$ufirst = $_POST['firstname'];
$ulast = $_POST['lastname'];
$uemail = $_POST['useremail'];
$upw = $_POST['userpw'];
$ugender = $_POST['usergender'];

$_SESSION['firstname'] = htmlentities($_POST['firstname']);
$_SESSION['lastname'] = htmlentities($_POST['lastname']);

$sqlselect = "SELECT * FROM tb_user_204_users WHERE email = '$uemail';";
$selectResult = mysqli_query($connection,$sqlselect);
$selectResultCheck = mysqli_num_rows($selectResult);

if($selectResultCheck > 0){
    header("Location:../create-account.php?signup=unsuccessful");
}
else{
    $sqlinsert = "INSERT INTO tb_user_204_users(firstname,lastname,email,userpw,gender)
    VALUES ('$ufirst','$ulast','$uemail','$upw','$ugender');";
    mysqli_query($connection,$sqlinsert);

    $sqlselect = "SELECT * FROM tb_user_204_users WHERE email = '$uemail';";
    $selectResult = mysqli_query($connection,$sqlselect);
    $row = mysqli_fetch_assoc($selectResult);
    $_SESSION['id'] = $row['id'];

    header("Location:../plan-party.php?signup=success");
   
}