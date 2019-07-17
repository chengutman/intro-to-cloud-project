<?php
 include_once 'dbh.inc.php';
session_start();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
        $pid = $_SESSION['cpid'];
        $did= $_SESSION['cdid'];
        $fid= $_SESSION['cfid'];
        $ft= $_SESSION['cft'];
        $drt= $_SESSION['cdt'];
        $drid=  $_SESSION['cdrid'];

        if ($ft =="service"){
            $sql = "DELETE FROM tb_users_204_foodservice WHERE fID ='$fid';";
            mysqli_query($connection,$sql);

        }
        else{
          $sql = "DELETE FROM tb_users_204_fooditem WHERE fID ='$fid';";
            mysqli_query($connection,$sql);
        }
        $sql = "DELETE FROM tb_users_204_food WHERE foodID ='$fid';";
            mysqli_query($connection,$sql);

        if ($drt =="service"){
              $sql = "DELETE FROM tb_users_204_drinkservice WHERE drID ='$drid';";
              mysqli_query($connection,$sql);
  
          }
          else{
            $sql = "DELETE FROM tb_users_204_drinkitem WHERE drID ='$drid';";
              mysqli_query($connection,$sql);
          }
          $sql = "DELETE FROM tb_users_204_drink WHERE drinkID ='$drid';";
              mysqli_query($connection,$sql);
          
          $sql = "DELETE FROM tb_users_204_guest WHERE pID ='$pid';";
          mysqli_query($connection,$sql);

          $sql = "DELETE FROM tb_users_204_details WHERE pID ='$pid';";
          mysqli_query($connection,$sql);

          $sql = "DELETE FROM tb_users_204_party WHERE partyID ='$pid';";
          mysqli_query($connection,$sql);

          echo $pid."  ".$did."  ".$drt."  ".$drid."  ".$ft." ".$fid;
?>

