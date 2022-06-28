<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<?php
    require 'connection.php';
    $id = $_GET['id1'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id=$id");
    $row=mysqli_fetch_array($result);
?>
<html>
    <head>
        <title>Update Form</title>
        <link rel="stylesheet" href="style.css">
        <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
    <form method="get" action="Admin_update.php">
        <h2><b>Update Form</b></h2>
        <div><b>Id:</b>
        <input type=" " name="id" value="<?php echo $id; ?>">
        </div><br>
 
        <div> 
            <lable><b>Name:</b></lable>
            <input type="text" placeholder="Name" name="Name" value="<?php echo $row['Name']?>">
        </div><br>
         
        <div>
            <lable><b>Email:</b></lable>
            <input type="text" placeholder="Email" name="Email" value="<?php echo $row['Email']?>">
        </div><br>
             
        <div>
            <lable><b>Password:</b></lable>
            <input type="password" placeholder="Password" name="Password" value="<?php echo $row['Password']?>">
        </div><br>
        
        <div>             
            <lable><b>Gender:</b></lable>
            <input type="radio" name="Gender" value="Male" <?php if($row['Gender']=="Male"){ echo "checked='checked'";} ?>> Male          
            <input type="radio" name="Gender" value="Female" <?php if($row['Gender']=="Female"){ echo "checked='checked'";} ?>> Female 
        </div><br>

        <div>
            <lable><b>Hobbie:</b></lable>
            <input type="checkbox" name="Hobbie[]" value="Cricket"<?php if(in_array("Cricket",explode(',',$row['Hobbie']))){echo "checked";}?>> Cricket <br>
            <input type="checkbox" name="Hobbie[]" value="Singing"<?php if(in_array("Singing",explode(',',$row['Hobbie']))){echo "checked";}?>> Singing <br>
            <input type="checkbox" name="Hobbie[]" value="Swimming"<?php if(in_array("Swimming",explode(',',$row['Hobbie']))){echo "checked";}?>> Swimming <br>
            <input type="checkbox" name="Hobbie[]" value="Shopping"<?php if(in_array("Shopping",explode(',',$row['Hobbie']))){echo "checked";}?>> Shopping <br><br>
        </div>

        <button type="submit" name="update" class="btn btn-primary " >Update</button></td>
        <a class="btn btn-success" href="Admin_List.php">Back</a>		
    </form>
    </body>
</html>