<html>
    <head>
        <title>
            Form
</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    //Reg Ex Declaration - Globaly.
    var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
    var $LNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
    var $FullNameRegEx = /^([a-zA-Z ]{2,40})$/;
    var $BankAccountNameRegEx = /^([a-zA-Z ]{2,60})$/;
    var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;

    var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
    var $ConNoRegEx = /^([0-9]{10})$/;
    var $AgeRegEx = /^([0-9]{1,2})$/;
    var $AadhaarNoRegEx = /^([0-9]{12})$/;
    var $GSTNoRegEx = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
    var $IndianDrivingLicenseNoRegEx = /^([A-Z]{2,3}[-/0-9]{8,13})$/;
    var $IndianVehicleRegNoRegEx = /^([A-Z]{2}[0-9]{1,2}[A-Z]{1,3}[0-9]{1,4})$/;
    var $PincodeRegEx = /^[1-9][0-9]{5,6}$/;
    var $PANNoRegEx = /^[A-Z]{3}[ABCFGHLJPT][A-Z][0-9]{4}[A-Z]$/;
    var $IFSCCodeRegEx = /^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
    var $BankAccountNoRegEx = /^([0-9]{9,18})$/;
    var $PostTitleRegex = /^(.{30,300})$/;
    var $PostDescRegex = /^(.{100,3000})$/;
    var $LatitudeLongitude = /^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,8})?|180(?:\.0{1,8})?)$/;


    var TxtNameFlag = false,
        lnNameFlag = false,
        eiNameFlag = false,
        TxtDateFlag = false,
        addNameFlag = false,
        DesignationFlag = false,
        TxtContactNoFlag = false,
        TxtContactMsgFlag = false;

    
    $(document).ready(function() {
        $("#Fname").blur(function() {
            TxtNameFlag = false;
            $("#FnameValidation").empty();
            if ($(this).val() == "") {
                $("#FnameValidation").html("(*) First name Required..!!");
                // alert("#fnValidation");
            } else {
                if (!$(this).val().match($FNameLNameRegEx)) {
                    $("#FnameValidation").html("(*) Invalid First Name..!!");
                    // alert("#fnValidation");
                } else {
                    TxtNameFlag = true;
                }
            }

        });
    });



    $(document).ready(function() {
        $("#Lname").blur(function() {
            lnNameFlag = false;
            $("#LnameValidation").empty();
            if ($(this).val() == "") {
                $("#LnameValidation").html("(*) Last Name Required..!!");

            } else {
                if (!$(this).val().match($LNameLNameRegEx)) {
                    $("#LnameValidation").html("(*) Invalid Last Name..!!");
                } else {
                    lnNameFlag = true;
                }
            }

        });
        $(document).ready(function() {
            $("#Email").blur(function() {
                eiNameFlag = false;
                $("#EmailValidation").empty();
                if ($(this).val() == "") {
                    $("#EmailValidation").html("(*) Email  required..!!");

                } else {
                    if (!$(this).val().match($EmailIdRegEx)) {
                        $("#EmailValidation").html("(*) Invalid Email..!!");
                    } else {
                        eiNameFlag = true;
                    }
                }

            })
        });
        $("#Address").blur(function () {
            $("#AddressValidation").empty();
            if ($(this).val() == "" || $(this).val() == null) {
                $("#AddressValidation").html("(*) Address required..!!");
                addNameFlag = false;
            }
            else {
                
                    addNameFlag = true;
            }
        });	

         $(document).ready(function(){
        		$("#Address").blur(function(){
        			addNameFlag=false;
        		$("#AddressValidation").empty();
        		if($(this).val()=="") 
        		{
        			$("#AddressValidation").html("(*) Address required..!!");

        		}
        		else{
        			
        				addNameFlag=true;
        		}
        	})
        });

        $(document).ready(function(){
        		$("#Designation").blur(function(){
        			DesignationFlag=false;
        		$("#agValidation").empty();
        		if($(this).find("option:selected").text() === " ") 
        		{
        			$("#DesignationValidation").html("(*) Designation required..!!");

        		}
        		else{
        			
        				DesignationFlag=true;
        		}
        	})
        });

        $("#Phone").blur(function() {
            TxtContactNoFlag = false;
            $("#PhoneValidation").empty();
            if ($(this).val() == "") {
                $("#PhoneValidation").html("(*) Contact No. required..!!");
            } else {
                if (!$(this).val().match($ConNoRegEx)) {
                    $("#PhoneValidation").html("(*) Invalid contact no..!!");
                } else {
                    TxtContactNoFlag = true;
                }
            }
        });

        $("#BtnSubmit").click(function() {
            TxtNameFlag = false;
            $("#FnameValidation").empty();
            if ($("#Fname").val() == "") {
                $("#FnameValidation").html("(*) First Name Required..!!");
            } else {
                if (!$("#Fname").val().match($FNameLNameRegEx)) {
                    $("#FnameValidation").html("(*) Invalid First Name..!!");
                } else {
                    TxtNameFlag = true;
                }
            }
            lnNameFlag = false;
            $("#LnameValidation").empty();
            if ($("#Lname").val() == "") {
                $("#LnameValidation").html("(*) Last Name Required..!!");
            } else {
                if (!$("#Lname").val().match($FNameLNameRegEx)) {
                    $("#LnameValidation").html("(*) Invalid Last Name..!!");
                } else {
                    lnNameFlag = true;
                }
            }
            eiNameFlag = false;
            $("#EmailValidation").empty();
            if ($("#Email").val() == "") {
                $("#EmailValidation").html("(*) Email_id Required..!!");
            } else {
                if (!$("#Email").val().match($EmailIdRegEx)) {
                    $("#EmailValidation").html("(*) Invalid Email_id..!!");
                } else {
                    eiNameFlag = true;
                }
            }



            DesignationFlag = false;
            $("#DesignationValidation").empty();
            if ($("#Designation").val() == "") {
                $("#DesignationValidation").html("(*) Designation Required..!!");
            } else {
                
                    DesignationFlag = true;
            
            }
   


            addNameFlag=false;
            $("#AddressValidation").empty();
            if($("#Address").val()=="") 
            {
            	$("#AddressValidation").html("(*) Address Required..!!");
            }
            else{
            	
            		addNameFlag=true;
            }
                       

            TxtContactNoFlag = false;
            $("#PhoneValidation").empty();
            if ($("#Phone").val() == "") {
                $("#PhoneValidation").html("(*) Contact No. Required..!!");
            } else {
                if (!$("#Phone").val().match($ConNoRegEx)) {
                    $("#PhoneValidation").html("(*) Invalid Contact No..!!");
                } else {
                    TxtContactNoFlag = true;
                }
            }

            if (TxtNameFlag == true && lnNameFlag == true && eiNameFlag == true && addNameFlag==true && TxtContactNoFlag == true && DesignationFlag == true) {
    
                document.register.submit();
                
            } else {
                alert("ERROR..!!");
            }
        });

        $("#Phone").keypress(function(e) {
            $("#PhoneValidation").empty();
            var Flag = false;
            (e.which >= 48 && e.which <= 57) ?
            Flag = true: (Flag = false, $("#PhoneValidation").html("(*) Invalid contact no..!!"));
            return Flag;
        });
       


    });
    </script>
</head>
<body>
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

			

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($FileType != "pdf" && $FileType != "doc" && $FileType != "xml" ) {
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

														
				$sql="insert into form(Fname,Lname,Email,Phone,Address,Gender,Designation,file)values('$Fname','$Lname','$Email','$Phone','$Address','$Gender','$Designation','$file')";
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


          

            <div>
              <label><b>Firstname</b></label>
              <input type="text" placeholder="Firstname" name="Fname" required="" id="Fname">
              <small id="FnameValidation"></small>
            </div><br>
            <div>
              
              <label><b>Lastname</b></label>
              <input type="text" placeholder="Lastname" name="Lname" required="" id="Lname">
              <small id="LnameValidation"></small>
            </div>
        
            </div><br>
            
            <div>
              <label><b>Email</b></label>
              <input type="text" placeholder="Email" name="Email" required="" id="Email">
              <small id="EmailValidation"></small>
            </div><br>
             <div>
        
              <label><b>Phone Number</b></label>
              <input type="text" placeholder="Phone Number" name="Phone" required="" id="Phone">
              <small id="PhoneValidation"></small>
            </div><br>
            <div>
           <label><b> Enter your address:</b><input type="text" name="Address" id="Address">
           <small id="AddressValidation"></small>
           <br>  
  
</div></label><br> 
<div><b> Gender</b>
<input type="radio" name="Gender" value="male"> Male
<input type="radio" name="Gender" value="female"> Female
</div><br>

<div class="form-group">
                        <b>Designation</b>
                            <select id="Designation" name="Designation" class="form-control">
                                <option value="">Choose Designation</option>
                                <option value="Jr.Software Devloper">Jr Devloper</option>
                                <option value="Sr.Software Devloper">Sr Devloper</option>
                                <option value="Project Manager">Associate Jr.Software Devloper</option>
                                <option value="Business Analyst"> Business Analyst</option>
                            </select>
                        </div>
                        <small id="DesignationValidation" class="text-danger"></small>
                    </div><br>
            
			<div>
			<b>Select File to Upload:</b> 
			<input type="file" name="fileToUpload" id="fileToUpload">
			</div><br><br>
            
             <button type="submit" name="submit" class="btn btn-primary " id="BtnSubmit" >Submit</button></td>
        
				
        </form>
    
 	
 </div>
</body>
</html>