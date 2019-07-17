
<?php
           session_start();
           $firstname = $_SESSION['firstname'];
           $lastname = $_SESSION['lastname'];
           $id = $_SESSION['id'];
           $category = $_SESSION['category'];
           $theme = $_SESSION['theme'];
           $party = $_SESSION['party']; 
            include_once 'dbh.inc.php';
            $sql = "SELECT * FROM tb_users_204_guest WHERE pID = '$party'; ";
            $selectResult = mysqli_query($connection,$sql);
            $data[] =array();
            $i = 0 ;
            while($row = mysqli_fetch_array($selectResult)){
                   $data[$i] = array("id"=>$row['guestID'] ,"fn"=>$row['gfname'] ,"ln"=>$row['glname']);
                   $i++;
                 }
            echo json_encode($data);
?>
