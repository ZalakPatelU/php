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
            include('Product_delete_image.php');
            $product_id = $_GET['product_id'];
            echo $product_id;
            $result = mysqli_query($conn, "DELETE FROM product WHERE product_id=$product_id");
            header("Location:Product_list.php");
        ?>
    </body>
</html>

