
	<form method="POST" name="frm">
   				
					  <h2>Form Details</h2>
				 <table id="table" border=2>
						
						  <tr>
						  <th>ID</th>
							<th>Fname</th>
							<!-- <td value="<?php echo $rowq['Fname'];?>"> </td> -->
							<th>Lname</th>
							<!-- <td value="<?php echo $rowq['Lname'];?>"> </td> -->
                            <th>Email</th>
							<!-- <td value="<?php echo $rowq['Email'];?>"> </td> -->
                            <th>Phone</th>
							<!-- <td value="<?php echo $rowq['Phone'];?>"> </td> -->
                            <th>Address</th>
							<!-- <td value="<?php echo $rowq['Address'];?>"> </td> -->
                            <th>Gender</th>
							<!-- <td value="<?php echo $rowq['Gender'];?>"> </td> -->
                            <th>Designation</th>
							<!-- <td value="<?php echo $rowq['Designation'];?>"> </td> -->
							<th>Files</th>
							<th>Subjects</th>
							<th>Operation</th>
							<td>AJAX DELETE</td>
							
						  </tr>
						
						  <?php
		include('config.php');
		$sqlq="select * from form";
		$resq=mysqli_query($conn,$sqlq);
		while($rowq=mysqli_fetch_array($resq))
		{
			?>

	<tr>
		<td><?php echo $rowq['id'];?></td>
		<td><?php echo $rowq['Fname'];?></td>
		<td><?php echo $rowq['Lname'];?></td>
		<td><?php echo $rowq['Email'];?></td>
		<td><?php echo $rowq['Phone'];?></td>
		<td><?php echo $rowq['Address'];?></td>
		<td><?php echo $rowq['Gender'];?></td>
		<td><?php echo $rowq['Designation'];?></td>
		<td><?php echo $rowq['file'];?></td>
		<td><?php echo $rowq['subject']?></td>

		<td> <button type="submit" name="delete"  onclick="deleteRecord('<?php echo $rowq['id'];?>')" >Delete</button>
			<!-- <button type="submit" name="update" name="update" onclick="updateRecord('<?php echo $rowq['id'];?>')" >Update</button></td> -->
			<a href="edit.php?id1=<?php echo $rowq['id'];?>">Edit </a>
			<td><a onclick="deletere(<?php echo $row['id']; ?>)"  title="delete" >Delete</a></td>

		</td>
														
		<?php
		}
		?>



	</tr>

	<script>
function deletere(id) {
	//  alert(id)
  if (id.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText==1)
        { 
	
           
			
            setInterval('window.location.reload()', 400);
			document.getElementById("txtHint").innerHTML = "Record deleted successfully";
        }
        else
        {
            document.getElementById("txtHint").innerHTML = this.responseText;
        }

      }
    };
    xmlhttp.open("GET", "delete.php?id=" + id, true);
    xmlhttp.send();
  }
}
</script>
<input type="text" id="txtHint">

					
                        											
					<?php
				
				if(isset($_POST['update']))
				{	
												
					$sql="update form set Fname='$Fname' ,Lname='$Lname',Email='$Email', Phone='$Phone',Address='$Address',Gender='$Gender',Designation='$Designation' where id='$id'";

					$r=mysqli_query($conn,$sql);									
				header("Location:form.php");

				
				}
		?>

                    <script >
   
   function deleteRecord(no){
       var f=document.frm;
         alert(no);  
       f.method="post";
   f.action='delete.php?id='+no;
       f.submit();
       }
	  
	   function updateRecord(no){
var f=document.frm;
alert(no);  
f.method="post";
f.action='edit.php?id='+no;
f.submit();
}
   
           
       </script>	
       
               </table>

                    
								</form>

		
						
 