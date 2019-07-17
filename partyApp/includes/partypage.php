<?php
 include_once 'dbh.inc.php';
session_start();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
       
        $data = array();
        $sqlParty = "SELECT * FROM tb_users_204_party WHERE userID='$id';";
        $sqlPartyResult  = mysqli_query($connection,$sqlParty);
        
        $numOfPartys= mysqli_num_rows($sqlPartyResult);

        if($numOfPartys > 0){
            $data[] =array();
            $i = 0 ;
             while($row = mysqli_fetch_array($sqlPartyResult)){
               $data[$i] = array("pid"=>$row['partyID'] ,"psdt"=>$row['partySDateTime'] ,"ped"=>$row['partyEDate'],"pc"=>$row["pCategory"]);
               $i++;
             }
            }
        echo json_encode($data);
?>