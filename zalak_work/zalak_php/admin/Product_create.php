<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }

?>
<?php 
				include('../Connection.php');
				echo "<pre>";
				print_r($_POST);
				echo "</pre>";

				if(isset($_POST['submit']))
				{	
					$Name=$_POST['Name'];
        			$Category=$_POST['category_id'];        			
                    $Created_By_User_id=$_POST['user'];
					$Image=$_FILES['Image']['name'];
        			$Active=$_POST['Active'];

					$targetDir = "uploads/";
					$fileName = basename($_FILES["Image"]["name"]);
					$targetFilePath = $targetDir . $fileName;
					$uploadOK = 1;
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

					if(isset($_POST["submit"]) && !empty($_FILES["Image"]["name"])){
						// Allow certain file formats
						$allowTypes = array('jpg','png','jpeg','JPG','PNG','JPEG');
						if(in_array($fileType, $allowTypes)){
							// Upload file to server
							if(move_uploaded_file($_FILES["Image"]["tmp_name"], $targetFilePath)){
								// Insert image file name into database
								$statusMsg = "File is uploaded." ;
							}else{
								$statusMsg = "Sorry, there was an error uploading your file.";
							}
						}else{
							$statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
						}
					}else{
						$statusMsg = 'Please select a file to upload.';
					}

					// Display status message
					echo $statusMsg;


					$sql="insert into product(Name,Category,Image,Created_By_User_id,Active)values('$Name','$Category','$Image','$Created_By_User_id','$Active')";
        			$r=mysqli_query($conn,$sql);
	
						if($r>=1)
						{
							echo "<script>
							window.location.href='Product_list.php'</script>";
						}
						else
						{
							echo "<script>alert('Try Again');</script>";
						}						
				}
			?>
<html>
    <head>
        <title>Create Form</title>
		<link rel="stylesheet" href="style.css">
		<linl rel="javascript" href="javascript.js">
		<!-- <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" /> -->
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">
            <h2> <b>Create Form</b></h2><br><br>
    		<div>
    			<label><b>Name: </b></label>
    			<input type="text" placeholder="Enter Name" name="Name" required="" id="Name">
    			<small id="FnameValidation"></small>
    		</div><br>			
                    
    		<div>
    			<label><b>Category: </b></label>
    			<select name="category_id" id="category_id" required="">
				<option>--Select--</option>
					<?php
						include('../Connection.php');
						$sql = "SELECT * FROM category WHERE active='Yes'";
						$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row = mysqli_fetch_assoc($result))
							{
								?>
								<option value="<?php echo $row['category_id']?>"><?php echo $row['CName']?></option>
							<?php }
						}
					?>
				</select>
    		</div><br>
    
			<div>
    			<label><b>Image: </b></label>
    			<input type="file" name="Image" id="Image" required accept=".jpg, .png, .jpeg, .JPG, .PNG, .JPEG" >
    		</div><br>

            <div>
    			<!-- <label><b>Created By User ID: </b></label> -->
				<input value="<?php  echo $_SESSION['Email']; ?>" name="user" hidden>
					
				   		 	
    		</div><br>

			<div> 
    			<lable><b>Active: </b></lable>
        		<input type="radio" name="Active" value="Yes" > Yes
        		<input type="radio" name="Active" value="No"> No
    		</div><br>
            
    		<button type="submit" name="submit" class="btn btn-success" id="BtnSubmit" >Submit</button></td>
			<a class="btn btn-success" href="Product_List.php">Back</a>	
		</form>
	</body>
</html>
<?php
var_dump($_POST);
//exit;
?>