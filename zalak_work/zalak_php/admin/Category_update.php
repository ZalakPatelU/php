<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<?php 
    include('../Connection.php');

    $category_id=$_GET['category_id'];
    $CName=$_GET['CName'];
    $Active=$_GET['Active'];
    //$Hobbie=$_GET['Hobbie'];
    
    $qry="UPDATE category SET CName='".$CName."',Active='".$Active."'   WHERE category_id=$category_id";

    $rs=mysqli_query($conn,$qry);
    if($rs)
    {
        //echo "Updated";
        header("location:Category_list.php");
        exit();
    }
    else
    {
        echo "Error...";
    }
?>