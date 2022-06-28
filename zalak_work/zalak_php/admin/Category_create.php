<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<html>
    <head>
        <title>Create Category Form</title>
		<link rel="stylesheet" href="style.css">
		<linl rel="javascript" href="javascript.js">
		<link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">
			<?php 
				include('../Connection.php');
				if(isset($_POST['submit']))
				{	
					$CName=$_POST['CName'];
        			$Active=$_POST['Active'];

					$sql="insert into category(CName,Active)values('$CName','$Active')";
        			$r=mysqli_query($conn,$sql);
	
        			if($r>=1)
        			{
            			echo "<script>
            			window.location.href='Category_list.php'</script>";
        			}
        			else
        			{
            			echo "<script>alert('Try Again');</script>";
        			}						
				}
			?>
            <h2> Create Category Form</h2><br><br>
    		<div>
    			<label><b>Name:</b> </label>
    			<input type="text" placeholder="Enter Name" name="CName" required="" id="CName">
    			<small id="FnameValidation"></small>
    		</div><br>
			<div> 
    			<lable><b>Active: </b></lable>
        		<input type="radio" name="Active" value="Yes">Yes
        		<input type="radio" name="Active" value="No">No
    		</div><br>
    		<button type="submit" name="submit" class="btn btn-success" id="BtnSubmit" >Submit</button></td>
			<a class="btn btn-success" href="Category_List.php">Back</a>
		</form>
	</body>
</html>