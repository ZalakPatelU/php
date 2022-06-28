<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<html>
    <head>
        <title>Delete</title>
    </head>
    <body>
        <?php
            include('connection.php');
            $id = $_GET['id'];
            echo $id;
            $result = mysqli_query($conn, "DELETE FROM admin WHERE id=$id");
            header("Location:Admin_list.php");
        ?>
    </body>
</html>

