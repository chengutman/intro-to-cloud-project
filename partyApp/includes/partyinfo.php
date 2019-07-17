<?php
 include_once 'dbh.inc.php';
session_start();
        $firstname = $_SESSION['firstname'];
        $lastname = $_SESSION['lastname'];
        $id = $_SESSION['id'];
        $pid = $_POST['pid'];
        
        $_SESSION['cpid']=$pid;
      
        
        
        
       
        $data = array();
        $sqlParty = "SELECT * FROM tb_users_204_party WHERE partyID='$pid';";
        $sqlPartyResult  = mysqli_query($connection,$sqlParty);
        $row = mysqli_fetch_assoc($sqlPartyResult);
        $data['party'] = array("pid"=>$pid ,"psdt"=>$row['partySDateTime'] ,"ped"=>$row['partyEDate'],"pc"=>$row["pCategory"],"pt"=>$row['pTheme'],"pl"=>$row['pLocation']);
        

        $sqldetail = "SELECT * FROM tb_users_204_details WHERE pID='$pid';";
        $sqldetailResult  = mysqli_query($connection,$sqldetail);
        $row = mysqli_fetch_assoc($sqldetailResult);
        $did = $row['detailsID'];
        $_SESSION['cdid']=$did;
        $data['details'] = array('did'=>$did, 'locationName'=>$row['lactionName'],'locationAddress'=>$row['loactionAddress']);

        $sqlguests ="SELECT * FROM tb_users_204_guest WHERE pID ='$pid';";
        $sqlguestsResult  = mysqli_query($connection,$sqlguests);

        $numOfguests= mysqli_num_rows($sqlguestsResult);

        if($numOfguests > 0){
            $i = 0 ;
             while($row = mysqli_fetch_array($sqlguestsResult)){
               $data['guests'][$i] = array("gid"=>$row['guestID'] ,"gfn"=>$row['gfname'] ,"gln"=>$row['glname']);
               $i++;
             }
            }

          $sqlFood = "SELECT * FROM tb_users_204_food WHERE dpID = '$did';";
          $sqlFoodResult  = mysqli_query($connection,$sqlFood);
          $row = mysqli_fetch_assoc($sqlFoodResult);

        $fid = $row['foodID'];
        $_SESSION['cfid']=$fid;
        $ft = $row['foodType'];
        $_SESSION['cft']=$ft;

        if($ft == "service"){
          $data['food'] = array('type'=>'service');
          $sqlFood = "SELECT * FROM tb_users_204_foodservice WHERE fID = '$fid';";
         
         
          $sqlFoodResult  = mysqli_query($connection,$sqlFood);
          $row = mysqli_fetch_assoc($sqlFoodResult);
          $data['foodservice'] = array('fsname'=>$row['fsName']);
        }
        else{
          $data['food'] = array('type'=>'list');
          $sqlFood = "SELECT * FROM tb_users_204_fooditem WHERE fID = '$fid';";
          $sqlFoodResult  = mysqli_query($connection,$sqlFood);
          $numOfItems= mysqli_num_rows($sqlFoodResult);
          if($numOfItems > 0){
              $i = 0 ;
               while($row = mysqli_fetch_array($sqlFoodResult)){
                 $data['fooditem'][$i] = array('gid'=>$row['gID'],'fid'=>$row['fidescription']);
                 $i++;
               }
              }

        }


        $sqlDrink = "SELECT * FROM tb_users_204_drink WHERE dpID = '$did';";
        $sqlDrinkResult  = mysqli_query($connection,$sqlDrink);
        $row = mysqli_fetch_assoc($sqlDrinkResult);

      $drid = $row['drinkID'];
      $_SESSION['cdrid']=$drid;
      $dt = $row['drinkType'];
      $_SESSION['cdt']=$dt;


      if($dt == "service"){
        $data['drink'] = array('type'=>'service');
        $sqlDrink = "SELECT * FROM tb_users_204_drinkservice WHERE drID = '$drid';";
        $sqlDrinkResult  = mysqli_query($connection,$sqlDrink);
        $row = mysqli_fetch_assoc($sqlDrinkResult);
        $data['drinkservice'] = array('dsname'=>$row['dsName']);
      }
      else{
        $data['drink'] = array('type'=>'list');
        $sqlDrink = "SELECT * FROM tb_users_204_drinkitem WHERE drID= '$drid';";
        $sqlDrinkResult  = mysqli_query($connection,$sqlDrink);
        $numOfItems= mysqli_num_rows($sqlDrinkResult);
        if($numOfItems > 0){
            $i = 0 ;
             while($row = mysqli_fetch_array($sqlDrinkResult)){
               $data['drinkitem'][$i] = array('gid'=>$row['gID'],'drid'=>$row['didescription']);
               $i++;
             }
            }

      }

        echo json_encode($data);
        
?>
