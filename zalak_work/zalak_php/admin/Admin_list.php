<?php
    session_start();
  
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<html>
    <head>
        <title>Form Details</title>
        <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        
        <form method="POST" name="frm">
        <center><h2>Form Details</h2></center><br>
           <div class="pull-right">
           <b>Logout: </b><a href="logout.php"><b><?php if($_SESSION['Email']){ echo $_SESSION['Email'];} ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
           <?php   
           if($_SESSION['Email']=="testuser@kcsitglobal.com"){ ?>
               <a class="btn btn-success" href="Admin_create.php">Add new admin</a>
           <?php } ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- <a class="btn btn-success" href="Catagory_list.php"> Catagory</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-success" href="Product_list.php"> Product</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
                <br><br>
            </div>
        <center><table  id="tabledata" class=" table table-striped table-hover table-bordered">
        <div class="w3-container">
        <table class="table table-bordered" >
            <tr style="background-color:#B955CF ; color:#080808;" class="text-center">     
            
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>            
                <th>Password</th>
                <th>Gender</th>
                <th>Hobbie</th>
                <?php if($_SESSION['Email']=="testuser@kcsitglobal.com"){ ?>
                <th>Update</th>  
                <th>Delete</th>
                <?php } ?>
            </tr>
                     
            <?php
                include('connection.php');
                $sqlq="SELECT * FROM admin WHERE utype=2";
                $resq=mysqli_query($conn,$sqlq);
                while($rowq=mysqli_fetch_array($resq))
                {
            ?>

            <tr class="text-center">
                <td><?php echo $rowq['id'];?></td>
                <td><?php echo $rowq['Name'];?></td>
                <td><?php echo $rowq['Email'];?></td>
                <td><?php echo $rowq['Password'];?></td>
                <td><?php echo $rowq['Gender'];?></td>
                <td><?php echo $rowq['Hobbie'];?></td>
                <?php if($_SESSION['Email']=="testuser@kcsitglobal.com"){ ?>

        
                <td><a href="Admin_edit.php?id1=<?php echo $rowq['id'];?>" class="btn btn-info">Update </a></td>
                <td><button type="submit" class="btn btn-danger" name="delete"  onclick="deleteRecord('<?php echo $rowq['id'];?>')" >Delete</button>                    
            <?php
                }}
            ?>

            </tr>
                                                                         
            <?php
            
                if(isset($_POST['update']))
                {	                                 
                    $sql="UPDATE admin SET Fname='$Name' ,Email='$Email', Password='$Password',Gender='$Gender',Hobbie='$Hobbie' WHERE id='$id'";
                    $r=mysqli_query($conn,$sql);									
                    header("Location:login.php");
                }
            ?>

            <script >
            function deleteRecord(no)
            {
                var f=document.frm;
                alert('Are you sure want to delete?');  
                f.method="post";
                f.action='Admin_delete.php?id='+no;
                f.submit();
                
            }
            </script>	
    
        </table></center>
        </form>
   
        
    </body>
</html>     
                     
