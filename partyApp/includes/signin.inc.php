<?php
include_once 'dbh.inc.php';
session_start();
$uemail = $_POST['useremail'];
$upw = $_POST['userpw'];

$sqlselect = "SELECT * FROM tb_user_204_users WHERE email = '$uemail';";
$selectResult = mysqli_query($connection,$sqlselect);
$selectResultCheck = mysqli_num_rows($selectResult);

if($selectResultCheck>0){
    $row = mysqli_fetch_assoc($selectResult);
    if($row['userpw']==$upw){
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['id'] = $row['id'];
        header("Location:../plan-party.php?signin=success");
    }
    else{
        header("Location:../login.php?signin=wrongpw");
    }
}
else{
    header("Location:../login.php?signin=wrongemail");
}

?>


