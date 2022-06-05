<?php
include('connect_db.php');

if(isset($_GET['ID'])){
    $ID= $_GET['ID'];

    $sql ="DELETE FROM fuszki WHERE ID=$ID";

   $result = $conn->query($sql);

   if($result){
     header("location: view.php");
   }
   else{
     echo "Wystąpił błąd";
   }
}


 ?>
