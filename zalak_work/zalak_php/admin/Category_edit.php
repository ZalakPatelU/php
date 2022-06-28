<?php
    session_start();
    if(!isset($_SESSION['Email']))
    {
        header("Location:login.php");
    }
?>
<?php
    include('../Connection.php');
    $category_id = $_GET['category_id1']; 
    $result = mysqli_query($conn, "SELECT * FROM category WHERE category_id=$category_id");
    $row=mysqli_fetch_array($result);
?>
<html>
    <head>
        <title><b>Edit Form</b></title>
        <link rel="stylesheet" href="style.css">
        <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
    <form method="get" action="Category_update.php">
        <h2><b>Edit Form</b></h2>
        <div><b>Id:</b>
        <input type=" " name="category_id" value="<?php echo $category_id; ?>">
        </div><br>
 
        <div> 
            <lable><b>CName:</b></lable>
            <input type="text" placeholder="Name" name="CName" value="<?php echo $row['CName']?>">
        </div><br>
         
        <div>             
            <lable><b>Active:</b> </lable>
            <input type="radio" name="Active" value="Yes" <?php if($row['Active']=="Yes"){ echo "checked='checked'";} ?>>Yes          
            <input type="radio" name="Active" value="No" <?php if($row['Active']=="No"){ echo "checked='checked'";}?>>No 
        </div><br>

        <button type="submit" name="update" class="btn btn-primary " >Update</button></td>
        <a class="btn btn-success" href="Category_List.php">Back</a>		
    </form>
    </body>
</html>