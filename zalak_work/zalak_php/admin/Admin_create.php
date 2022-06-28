<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<html>
    <head>
        <title>Create Form</title>
		<link rel="stylesheet" href="style.css">
		<linl rel="javascript" href="../javascript.js">
		<link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<form method="POST" enctype="multipart/form-data">
			<?php 
				include('connection.php');
				if(isset($_POST['submit']))
				{	
					$Name=$_POST['Name'];
        			$Email=$_POST['Email'];
        			$Password=$_POST['Password'];
        			$Gender=$_POST['Gender'];
					$Hobbie=implode(",", $_POST['Hobbie']);
					$utype=2;
					$sql="INSERT into admin(Name,Email,Password,Gender,Hobbie,utype)values('$Name','$Email','$Password','$Gender','$Hobbie','$utype')";
        			$r=mysqli_query($conn,$sql);
	
        			if($r>=1)
        			{
            			echo "<script>
            			window.location.href='Admin_list.php'</script>";
        			}
        			else
        			{
            			echo "<script>alert('Try Again');</script>";
        			}						
				}
			?>
			
            <h2><b><u> Create Form</u></b></h2><br>
    		<div>
    			<label><b>Name:</b> </label>
    			<input type="text" placeholder="Enter Your Name Here..." name="Name" required="" id="Name">
    			<small id="NameValidation"></small>
    		</div><br>			
                    
    		<div>
    			<label><b>Email:</b> </label>
    			<input type="text" placeholder="Enter Your Email Here..." name="Email" required="" id="email">
    			<small id="EmailValidation"></small>
    		</div><br>
    
			<div>
    			<label><b>Password: </b></label>
    			<input type="password" placeholder="Enter Your Password Here..." name="Password" required="" id="Password">
    			<small id="PasswordValidation"></small>
    		</div><br>

			<div> 
    			<lable><b>Gender: </b></lable>
        		<input type="radio" name="Gender" value="Male"> Male
        		<input type="radio" name="Gender" value="Female"> Female
    		</div><br>

			<div>
				<lable><b>Hobbie:</b></lable>
				<input type="checkbox" name="Hobbie[]" value="Cricket"/> Cricket <br>
				<input type="checkbox" name="Hobbie[]" value="Singing"/> Singing <br>
				<input type="checkbox" name="Hobbie[]" value="Swimming"/> Swimming <br>
				<input type="checkbox" name="Hobbie[]" value="Shopping"/> Shopping <br><br>
			</div>
            
    		<button type="submit" onclick="validate()" name="submit" class="btn btn-success" id="BtnSubmit" >Submit</button></td><br><br>
			<a class="btn btn-success" href="Admin_List.php">Back</a><br>
		</form>
	</body>
</html>