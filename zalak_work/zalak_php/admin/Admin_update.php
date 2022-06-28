<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<?php 
    require 'connection.php';

    $id=$_GET['id'];
    $Name=$_GET['Name'];
    $Email=$_GET['Email'];
    $Password=$_GET['Password'];
    $Gender=$_GET['Gender'];
    $Hobbie=implode(",", $_GET['Hobbie']);
    
    $qry="UPDATE admin SET Name='".$Name."',Email='".$Email."' ,Password='".$Password."',Gender='".$Gender."',Hobbie='".$Hobbie."'   WHERE id=$id";

    $rs=mysqli_query($conn,$qry);
    if($rs)
    {
        //echo "Updated";
        header("location:Admin_list.php");
        exit();
    }
    else
    
    {
        echo "Error...";
    }
?>