<?php
    session_start();
    include("connection.php");
    if(isset($_POST['request'])){
        $request1 = $_POST['request'];

        $query = "SELECT * FROM product WHERE Catagory = '$request1' AND Active = 'Yes'";
        $result1 = mysqli_query($conn,$query);  
        //echo $result; exit;

        $count = mysqli_num_rows($result1);
       
?>

<table class="table">
    <?php
        if($count){
    ?>  
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Catagory</th>
            <th>Image</th>
            <th>Catagory By User ID</th>
            <th>Active</th>
            <th>Update</th>  
            <th>Delete</th>
        </tr>
            
        <?php
        }else{
            echo "Sorry no data found";
        }
        ?>
    </thead>
    <?php
    if (mysqli_num_rows($result1) > 0) {
        //echo "true..";
        while($rowq=mysqli_fetch_assoc($result1))
        {
    ?>  

    <tr class="text-center">
        <td><?php echo $rowq['product_id'];?></td>
        <td><?php echo $rowq['Name'];?></td>
        <td>
            <?php 
                $catagory_id=$rowq['Catagory'];
                $sql = "SELECT * FROM catagory WHERE catagory_id='$catagory_id'";
                $result2 = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result2) > 0)
                {
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                        echo $row2['CName'];
                    }
                }
            ?>
        </td>
        <td><img src="<?php echo "uploads/".$rowq['Image'];?>" width=100px alt="Image"></td>
        <td><?php  if (isset($_SESSION['Email']))
            {
                echo $_SESSION['Email'];                
            } ?>
        </td>

        <td><?php echo $rowq['Active'];?></td>
        <td><a href="Product_edit.php?product_id1=<?php echo $rowq['product_id'];?>" class="btn btn-info">Update </a></td>
        <td>
            <form action="Product_delete_image.php" method="POST">
                <input type="hidden" name="delete_id" value="<?php echo $rowq['product_id']; ?>">
                <input type="hidden" name="del_image" value="<?php echo $rowq['Image']; ?>">
                <button type="submit" name="delete_image" class="btn btn-danger">Delete</button>
            </form>
        </td>                    
    <?php
        }
    ?>
        
    </tr>
    <?php
    }
    ?>
</table>
<?php
 }
 ?>