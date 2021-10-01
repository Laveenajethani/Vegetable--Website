<?php

 include("connection.php");
     
    if(isset($_REQUEST["txt_quantity"]))
   {
       $Qty=$_REQUEST["txt_quantity"];
       $ItemId=$_REQUEST["hdn_Pid"];
       $RegId=$_SESSION["RegId"];
       $qry="SELECT * FROM tbl_cart WHERE ItemId= $ItemId and RegId=$RegId ";
       echo $qry;
       $tbl=mysqli_query($con,$qry);
       if(mysqli_affected_rows($con)==0)
       {
           $qry="INSERT INTO tbl_cart (RegId,ItemId,Qty) VALUES ($RegId,$ItemId,$Qty)";
            
           mysqli_query($con,$qry);
       }
        
        header("Location:cart.php");
   }



    
?>