<?php
            include 'connection.php';
            if(!isset($_SESSION)) 
            {  
                session_start(); 
            } 
            if(isset($_REQUEST)&& count($_REQUEST)>0)
            {
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];  
                $sql = "select * from admin where Email = '$Email' and Password = '$Password'"; 
                $result = mysqli_query($conn, $sql); 
                if (mysqli_num_rows($result) > 0) 
                {
                    while($row = mysqli_fetch_assoc($result)) 
                    { 
                        $_SESSION['Email']=$Email; 
                        $_SESSION['utype']=$utype;
                        $_SESSION['id']=$id;
                        //session_unset();
                       // print_r($_SESSION);
                        header("Location:Admin_list.php"); 
                    } 
                } 
                else 
                {
                    echo "Email or Password Invalid."; 
                }
            }
        ?>