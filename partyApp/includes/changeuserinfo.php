<?php
include_once 'dbh.inc.php';
session_start();
$uemail = $_POST['useremail'];
$upw = $_POST['userpw'];
$id = $_SESSION['id'];
if($uemail){
$sqlupdatep = "UPDATE tb_user_204_users SET email = '$uemail' WHERE id = '$id';";
mysqli_query($connection,$sqlupdatep);
}

if($upw){
    $sqlupdatep = "UPDATE tb_user_204_users SET userpw = '$upw' WHERE id = '$id';";
    mysqli_query($connection,$sqlupdatep);
}

header("Location:../userprofile.php?change=success");
?>


