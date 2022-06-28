<!DOCTYPE html>
<html lang="en">
<head>
  <title>Php Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PHP Task</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="">User side </a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="Category_list.php">Add Category</a></li>
      <li><a href="Product_list.php">Add Product</a></li>
    </ul>
    <button class="btn btn-danger navbar-btn"><a href="logout.php">Logout</a></button>
  </div>
</nav>
  


</body>
</html>


<?php
    session_start();
    @$Email=$_SESSION['Email1'];
    @$utype=$_SESSION['utype'];
?>

        <form method="POST" name="frm">
        <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
        <center><h2>Product Details</h2></center>
           
            <div class="pull-right" id="filters">
            <?php if($utype == "1" || $utype == "2"){ ?>
            <b>Logout: </b><a href="logout.php"><b><?php if($_SESSION['Email']){ echo $_SESSION['Email'];} ?></b></a>&nbsp;&nbsp;&nbsp;&nbsp;
          
                <a class="btn btn-success" href="Product_create.php">Add new Product</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-success" href="Catagory_list.php">Back</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-success" href="Product_list.php">Back to Product List</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <br><br>  <?php } ?>

                <span><b>Catagory: </b>&nbsp;</span>
                <select name="category_id" id="category_id">
					<?php
						include('../Connection.php');
						$sql = "SELECT * FROM category WHERE Active='Yes' ";
						$result3 = mysqli_query($conn, $sql);
                    ?> 
                    <option>--Select--</option>
                    
						<?php 
                            if(mysqli_num_rows($result3)>0)
						    {
                                
							    while($row3 = mysqli_fetch_assoc($result3))
							    {
						?>
								<option value="<?php echo $row3['category_id']?>"><?php echo $row3['CName']?></option>
							<?php 
                            }
						}
					?>
				</select><br>
            </div>

            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Name</th>
                            <th>Catagory</th>
                            <th>Image</th>
                            <th>Catagory By User ID</th>
                            <th>Active</th>
                            <?php if($utype == "1" || $utype == "2"){ ?>
                            <th>Update</th>  
                            <th>Delete</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <?php
                        include('connection.php');
                        $sqlq="SELECT p.product_id, p.Name, c.CName,a.Email,p.Active,p.Image FROM product p INNER JOIN catagory c ON p.Catagory = c.catagory_id INNER JOIN admin a ON p.Created_By_User_id = a.email where c.Active= 'Yes' and p.Active='Yes';";
                        $resq=mysqli_query($conn,$sqlq);
                        while($rowq=mysqli_fetch_array($resq))
                        {
                    ?>
        
                    <tr class="text-center">
                        <td><?php echo $rowq['product_id'];?></td>
                        <td><?php echo $rowq['Name'];?></td>
                        <td><?php echo $rowq['CName'];?></td>
                        <td><img src="<?php echo "uploads/".$rowq['Image'];?>" width=100px alt="Image"></td>
                        <td><?php echo $rowq['Email']; ?> </td>

                        <td><?php echo $rowq['Active'];?></td>
                        <?php if($utype == 1 || $utype == 2){ ?>
                        <td><a href="Product_edit.php?product_id1=<?php echo $rowq['product_id'];?>" class="btn btn-info">Update </a></td>
                        <td>
                            <form action="Product_delete_image.php" method="POST">
                                <input type="hidden" name="delete_id" value="<?php echo $rowq['product_id']; ?>">
                                <input type="hidden" name="del_image" value="<?php echo $rowq['Image']; ?>">
                                <button type="submit" name="delete_image" class="btn btn-danger" onclick="deleteRecord('<?php echo $rowq['Name']; ?>')">Delete</button>
                            </form>
                        </td>    

                    <?php
                        }}
                    ?>
        
                    </tr>
                    <?php
                    
                    if(isset($_POST['update']))
                    {	                                 
                        $sql="update product set Name='$Name',Active='$Active' where product_id='$product_id'";
                        $r=mysqli_query($conn,$sql);									
                        header("Location:Product_list.php");
                        confirm('Are you sure want to update?');
                    }
                ?>
    
                <script >
                function deleteRecord(no)
                {
                    var f=document.frm;
                    alert('Are you sure want to delete?');  
                    f.method="post";
                    f.action='Product_delete.php?product_id='+no;
                    f.submit();
                    
                }
                </script>	
                   
                </table>
            </div>

            
        </form>
        
        <script type="text/javascript">
                //alert(11)
                $(document).ready(function(){
                    
                    $("#catagory_id").change(function(){
                        var value = $(this).val()
                        console.log(value);
                        // alert(value);
                        
                       
                        $.ajax({
                            url:"fetch.php",
                            type:"POST",
                            data:'request=' + value,
                            beforeSend:function(){
                                $(".container").html("<span>Working...</span>");
                            },
                            success:function(data){
                                $(".container").html(data);
                            }
                        })
                    });
                });

            </script>
    </body>
</html>     