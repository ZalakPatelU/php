<html>  
    <head>  
        <title>PHP login system</title>   
        <link rel = "stylesheet" type = "text/css" href = "style.css">
        <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
    </head>  
    <body>  
        <div id = "frm">  
        <br><br><br>
            <center>     
            <form name="f1" action="authentication.php" onsubmit="return validation()" method="POST">  
            <h2> Log In</h2>
            <div>
                    <label>Email: </label>
                    <input type="text" placeholder="Enter Email" name="Email"  id="Email">
                    <small id="EmailValidation"></small>
                </div><br>
        
                <div>
                    <label>Password: </label>
                    <input type="password" placeholder="Enter Password" name="Password"  id="Password">
                    <small id="PasswordValidation"></small>
                </div><br>

                <button type="submit" name="submit" class="btn btn-success" id="BtnSubmit" >Log In</button></td><br><br>
                
            </form>  
            </center>
        </div>   
        <script>  
                function validation()  
                {  
                    var id=document.f1.Email.value;  
                    var ps=document.f1.Password.value;  
                    if(id.length=="" && ps.length=="")                 
                    {  
                        alert("Email and Password fields are empty");  
                        return false;  
                    }  
                    else  
                    {  
                        if(id.length=="") 
                        {  
                            alert("Email is empty");  
                            return false;  
                        }   
                        if (ps.length=="") 
                        {  
                            alert("Password field is empty");  
                            return false;  
                        }  
                    }                             
                }  
            </script>  
    </body>     
</html>  