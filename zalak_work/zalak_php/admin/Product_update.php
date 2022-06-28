
<?php 
    //  session_start();
    //  require 'connection.php';
     $product_id = $_GET['product_id1'];
     //var_dump($_GET);
     if(isset($_REQUEST['update'])){
         
         $Name=$_POST['Name'];
         $Category = $_POST['category_id']; 
         $Active=$_POST['Active'];
     
         $qry="UPDATE product SET Name='".$Name."',Category='".$Category."',Active='".$Active."'   WHERE product_id=$product_id";
       
         $rs=mysqli_query($conn,$qry);
         if($rs)
         {
             //echo "Updated";
             header("location:Product_list.php");
             exit();
         }
         else
         {
             echo "Error...";
         }
             
         }
    
?>