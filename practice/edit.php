<?php
    require 'config.php';

    // var_dump($_POST);
    // $qry="SELECT * FROM form WHERE id=$id2";
    // $rs=mysqli_query($conn,$qry);
    // $row=mysqli_fetch_array($rs);

    
$id = $_GET['id1'];
echo $id;
var_dump($_GET);
$result = mysqli_query($conn, "SELECT * FROM form WHERE id=$id");

$row=mysqli_fetch_array($result);

 ?>
<html>
    <head>
        <title>
            Form
</title>
</head>
<body>
<form method="get" action="update.php">
  <div>id
  <input type=" " name="id" value="<?php echo $id; ?>">
  </div><br>
 
            <div>
               
              <label>Firstname</label>
              <input type="text" placeholder="Firstname" name="Fname" value="<?php echo $row['Fname']?>">
            </div><br>
            <div>
              
              <label>Lastname</label>
              <input type="text" placeholder="Lastname" name="Lname" value="<?php echo $row['Lname']?>">
            </div>
        
            </div><br>
            
            <div>
              <label>Email</label>
              <input type="text" placeholder="Email" name="Email" value="<?php echo $row['Email']?>">
            </div><br>
             <div>
        
              <label>Phone Number</label>
              <input type="text" placeholder="Phone Number" name="Phone" value="<?php echo $row['Phone']?>">
            </div><br>
            <div>
           <label> Enter your address:<input type="text" name="Address" value="<?php echo $row['Address']?>"><br>  
  
</div></label><br> 
<div> Gender
<input type="radio" name="Gender" value="male"> Male
<input type="radio" name="Gender" value="female"> Female</div><br>

              <label>Designation</label>
            <select name="Designation">
            	<option value="HR">HR</option>
            	<option value="Project Manager">Project Manager</option>
            	<option value="QA">QA</option>
            	<option value="Software Engineer">Software Engineer</option>
            	<option value="Ui/UX">Ui/UX</option>
            </select>
            </div><br><br>
            
            
             <button type="submit" name="submit" class="btn btn-primary " >Submit</button></td>
        
				
        </form>
    
 	
 </div>
</body>
</html>