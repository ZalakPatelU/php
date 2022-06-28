<?php
    require 'config.php';
  
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

          <div> 
          <lable>Gender: </lable>

            <input type="radio" name="Gender" value="0" <?php if($row['Gender']=="0"){ echo "checked='checked'";}else{echo "checked='checked'";} ?>> Male          

            <input type="radio" name="Gender" value="1" <?php if($row['Gender']=="1"){ echo "checked='checked'";}else{echo "checked='checked'";} ?>> Female

        </div><br>
         
          <div class="form-group">
                        <b>Designation</b>
                            <select id="Designation" name="Designation" class="form-control">
                                <option value="">Choose Designation</option>
                                <option value="Jr.Software Devloper" <?php if($row['Designation']=="Jr Devloper"){echo "selected";}?>> Jr Devloper</option>
                                <option value="Sr.Software Devloper" <?php if($row['Designation']=="Sr Devloper"){echo "selected";}?>> Sr Devloper</option>
                                <option value="Project Manager" <?php if($row['Designation']=="Project Manager"){echo "selected";}?>> Project Manager</option>
                                <option value="Business Analyst" <?php if($row['Designation']=="Business Analyst"){echo "selected";}?>>  Business Analyst</option>
                            </select>
                  
                        <small id="DesignationValidation" class="text-danger"></small>
                    </div><br><br><br>
            
            
             <button type="submit" name="submit" class="btn btn-primary ">Submit</button></td>
        
				
        </form>
    
 	
 </div>
</body>
</html>