<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<?php
	include('connection.php');
	
	if(isset($_POST['delete_image']))
	{
		$product_id = $_POST['delete_id'];
		$Image = $_POST['del_image'];

		$query = "DELETE FROM product WHERE product_id='$product_id' ";
		$query_run = mysqli_query($conn,$query);

		if($query_run)
		{
			unlink("uploads/".$Image);
			echo "File deleted successfully!!!";
			header("Location: Product_list.php");
		}
		else
		{
			echo "File not deleted!!!";
			header("Location: Product_list.php");
		}
	}
?>