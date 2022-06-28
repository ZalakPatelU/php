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
            include('../Connection.php');
            $category_id = $_GET['category_id'];
            echo $category_id;
            $result = mysqli_query($conn, "DELETE FROM category WHERE category_id=$category_id");
            header("Location:Category_list.php");
        ?>
    </body>
</html>

