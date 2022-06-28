<html>
  <head>
    <title>
            Form
    </title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>
    <h1><center><u>Registration Form</u></center></h1>
    <form method="POST" enctype="multipart/form-data">
 
      <?php 
					include('config.php');
						if(isset($_POST['submit']))
						{	
								
				      $Fname=$_POST['Fname'];
				      $Lname=$_POST['Lname'];
              $Email=$_POST['Email'];
              $Phone=$_POST['Phone'];
              $Address=$_POST['Address'];
              $Gender=$_POST['Gender'];
              $Designation=$_POST['Designation'];
				      $file=$_FILES["fileToUpload"]['name'];
              $subject=$_POST['subject'];
              $subject=implode(", ", $_POST['subject']);

                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


                // Check if file already exists
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 5000000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
                }

                // Allow certain file formats
                if($FileType != "pdf" && $FileType != "doc" && $FileType != "xml" && $FileType != "jpg") {
                  echo "Sorry, only pdf, doc, xml files are allowed.";
                  $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
                }
														
				        $sql="insert into form(Fname,Lname,Email,Phone,Address,Gender,Designation,file,subject)values('$Fname','$Lname','$Email','$Phone','$Address','$Gender','$Designation','$file', '$subject')";
              	$r=mysqli_query($conn,$sql);
	
                if($r>=1)
                {
                    echo "<script>alert('form Add successfully');
                  window.location.href='view.php'</script>";
                }
  
                else
                {
                    echo "<script>alert(' fail,Try Again');</script>";
                }

							
						}
			  ?>


      <div class="center" >   
     

            <div>
              <label class="w3-text-blue"><b>Firstname :</b></label>
              <input type="text" placeholder="Firstname" name="Fname" required="" id="Fname">
              <small id="FnameValidation"></small>
            </div><br>
            <div>
              
              <label><b>Lastname :</b></label>
              <input type="text" placeholder="Lastname" name="Lname" required="" id="Lname">
              <small id="LnameValidation"></small>
            </div>
        
            <br>
            
            <div>
              <label><b>Email :</b></label>
              <input type="email" placeholder="example@test.com" name="Email" required="" id="Email">
              <small id="EmailValidation"></small>
            </div><br>
             <div>
        
              <label><b>Phone Number :</b></label>
              <input type="text" placeholder="Phone Number" name="Phone" required="" id="Phone">
              <small id="PhoneValidation"></small>
            </div><br>
            <div>

           <label><b> Enter your address :</b><input type="text" name="Address" id="Address">
           <small id="AddressValidation"></small>
           <br>  
  
                </div></label><br> 
                <div><b> Gender :</b>
                <input type="radio" name="Gender" value="male"> Male
                <input type="radio" name="Gender" value="female"> Female
                </div><br>

                <div class="form-group">
                  <b>Designation :</b>
                    <select id="Designation" name="Designation" class="form-control">
                      <option value="">Choose Designation :</option>
                      <option value="Jr.Software Devloper">Jr Devloper</option>
                      <option value="Sr.Software Devloper">Sr Devloper</option>
                      <option value="Project Manager">Project Manager</option>
                      <option value="Business Analyst"> Business Analyst</option>
                    </select>
                </div>
                    <small id="DesignationValidation" class="text-danger"></small>
                    <br>
            
                    <div>
                    <b>Select File to Upload :</b> 
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    </div><br><br>
            <div>
              <label><b>Favorite Subjects :</b></label>
                  <br />
                  <input type="checkbox" name="subject[]" value="Math"/>Math
                  <br />
                  <input type="checkbox" name="subject[]" value="English"/>English
                  <br />
                  <input type="checkbox" name="subject[]" value="Science"/>Science
                  <br />
                  <input type="checkbox" name="subject[]" value="History"/>History
            <div><br /><br />
            
            <button type="submit" name="submit" class="btn btn-primary " id="BtnSubmit" >Submit</button></td>
        
				
    </form>
    
 	
      </div>
            </div>
              <script src="form.js"></script>
  </body>
</html>

