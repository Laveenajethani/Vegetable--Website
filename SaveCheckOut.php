<?php
   include("connection.php");

    if(isset($_REQUEST["btn_submit"]))
    {
        $BA_FirstName=$_REQUEST["txt_fname_BA"];
        $BA_LastName=$_REQUEST["txt_lname_BA"];
        $BA_StateId=$_REQUEST["txt_state_BA"];
        $BA_Address1=$_REQUEST["txt_Address1_BA"];
        $BA_Address2=$_REQUEST["txt_Address2_BA"];
        $BA_City=$_REQUEST["txt_city_BA"];
        $BA_Pin=$_REQUEST["txt_pin_BA"];
       
        $Total=$_SESSION["Total"];
        $Delivery=$_SESSION["Delivery"];
        $Tax=$_SESSION["Tax"];
        $Net=$_SESSION["Net"];
        
        $RegId=$_SESSION["RegId"];
        
        
        $qry="INSERT INTO tbl_ordermaster(BA_FirstName,BA_LastName,BA_StateId, BA_Address1, BA_Address2, BA_City, BA_Pin,TotalAmt,Tax,NetAmt,RegId) VALUES ('$BA_FirstName','$BA_LastName','$BA_StateId','$BA_Address1','$BA_Address2','$BA_City','$BA_Pin','$Total','$Tax', '$Net','$RegId')";
       
        mysqli_query($con,$qry);
        
        $qry= "select max(OMId) as omid from tbl_ordermaster";
            
       $tbl=mysqli_query($con,$qry);
       if($r=mysqli_fetch_array($tbl))
       {
           $OMId=$r["omid"];
           $RegId=$_SESSION["RegId"];
           
           $qry="Insert into tbl_orderdetails (OMId, ProductId, Qty, Price ) SELECT $OMId, tbl_cart.ItemId, Qty, ItemPrice FROM tbl_cart, tbl_shop WHERE tbl_cart.ItemId = tbl_shop.ItemId and RegId=$RegId ";
           
           mysqli_query($con,$qry);
       }
        
    
        header("Location:member-home.php");
        
    }


?>