<script>

   
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