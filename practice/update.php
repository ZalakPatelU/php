//<?php

//include('config.php');


//$id = $_GET['id'];
//echo $id;

//$result = mysqli_query($conn, "UPDATE form SET Fname='$Fname' ,Lname='$Lname' where id='$id'");

//header("Location:form.php");
//?>
<!-- <html>
<body>
<div>
              <label>Firstname</label>
              <input type="text" placeholder="Firstname" name="Fname" required="">
            </div><br>
            <div>
              
              <label>Lastname</label>
              <input type="text" placeholder="Lastname" name="Lname" required="">
            </div>
        
            </div><br>
            
            <div>
              <label>Email</label>
              <input type="text" placeholder="Email" name="Email" required="">
            </div><br>
             <div>
        
              <label>Phone Number</label>
              <input type="text" placeholder="Phone Number" name="Phone" required="">
            </div><br>
            <div>
           <label> Enter your address:<input type="text" name="Address"><br>  
  
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
</html> -->


<?php 
require 'config.php';

//var_dump($_GET);

$id=$_GET['id'];
$Fname=$_GET['Fname'];
$Lname=$_GET['Lname'];
$Email=$_GET['Email'];
$Phone=$_GET['Phone'];
$Address=$_GET['Address'];
$Gender=$_GET['Gender'];
$Designation=$_GET['Designation'];

$qry="UPDATE form SET Fname='".$Fname."',Lname='".$Lname."' ,Email='".$Email."' ,Phone='".$Phone."',Address='".$Address."' ,Gender='".$Gender."' ,Designation='".$Designation."'  WHERE id=$id";


$rs=mysqli_query($conn,$qry);



if($rs)

{

    //echo "Updated";

     header("location:view.php");

     exit();

}

else

{

    echo "Error...";

}

?>
