<?php

include('config.php');


$id = $_GET['id'];
echo $id;

$result = mysqli_query($conn, "DELETE FROM form WHERE id=$id");

header("Location:view.php");
?>


