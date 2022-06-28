
<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
    include('../Connection.php');
    include 'Product_update.php';
    $product_id = $_GET['product_id1'];

    
    // var_dump($_GET);
    $result = mysqli_query($conn, "SELECT * FROM product WHERE product_id=$product_id");
    $row=mysqli_fetch_array($result);
    
?>
<html>
    <head>
        <title>Edit Form</title>
        <link rel="stylesheet" href="style.css">
       
    </head>
    <body>
    <form method="POST" action="">
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
        <h2><b>Edit Form</b></h2>
        <div><b>Id:</b>
        <input type=" " name="product_id" value="<?php echo $product_id; ?>">
        </div><br>
 
        <div> 
            <lable><b>Name:</b></lable>
            <input type="text" placeholder="Name" name="Name" value="<?php echo $row['Name']?>" required="">
        </div><br>
         
        <div>
            <label><b>Catagory:</b> </label>
            <select name="catagory_id" id="catagory_id" >
					<?php
						include('connection.php');
						$sql = "SELECT * FROM catagory";
						$result1 = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result1)>0)
						{
							while($row1 = mysqli_fetch_assoc($result1))
							{
								?>
								<option value="<?=$row1['catagory_id']?>"<?php if($row['Catagory'] == $row1['catagory_id']){echo "selected";}?>><?=$row1['CName']?></option>
							<?php }
						}
					?>
				</select>
            
        </div><br>
        
        <div>
            <b>Uploaded File: </b><?php echo $row['Image']; ?>
        </div><br>
        <div>
    		<label><b>Created By User ID:</b> </label>
            <?php  if (isset($_SESSION['Email']))
                    {
                        echo $_SESSION['Email'];
            
                    } ?>
				   			
    	</div><br>

        <div>             
            <lable><b>Active: </b></lable>
            <input type="radio" name="Active" value="Yes" <?php if($row['Active']=="Yes"){ echo "checked='checked'";} ?> required>Yes          
            <input type="radio" name="Active" value="No" <?php if($row['Active']=="No"){ echo "checked='checked'";}?>>No 
        </div><br>

        <button type="submit" name="update" class="btn btn-primary " >Update</button></td>
        <a class="btn btn-success" href="Product_List.php">Back</a>		
    </form>
    </body>
</html>