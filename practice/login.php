<html>
<form method="POST">
<h2><u>Registration Form</u></h2>
<div><?php echo $nameErr;?>Name: <input type="text" name="name"></div><br>

Address: <input type="textarea" name="address"><?php echo $addressErr;?><br>

<label for="desig">Designation :</label>

<select name="designation" id="designation"><?php echo $designationErr;?>
<option value=""></option>
<option value="HR">HR</option>
  <option value="QA">QA</option>
  <option value="Accountant">Accountant</option>
  <option value="Software Engineer">Software Engineer</option>
</select><br>

Gender :<input type="radio" name="gender" value="male"> Male
<input type="radio" name="gender" value="female"> Female<?php echo $genderErr;?><br>

Contact No. :  <input type="text" name="number"> <?php echo $numberErr;?><br>
<input type="submit">
</form>

</html>
<?php
$data = $_POST;

  foreach($data as $key=>$value){
    if(empty($value)){
        $msg= $key . "  Is Required";
     echo $msg;

 }
}

?>
<?php

$nameErr = $addressErr = $designationErr = $genderErr = $numberErr= "";
$name = $address = $designation = $gender = $number= "";
  if (empty($_POST["name"])) {
    $nameErr = "Name is Required";
  } else {
    $name = ($_POST["name"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is Required";
  } else {
    $address =($_POST["address"]);
  }


  if (empty($_POST["designation"])) {
    $designationErr = "Please Select Designation";
  } else {
    $designation=($_POST["designation"]);
  }

  if (empty($_POST["gender"])) {
   $genderErr = "Gender is required";
  } else {
    $gender =($_POST["gender"]);
  }

  if (empty($_POST["number"])) {
    $numberErr = "Contact number is required";
   } else {
     $number =($_POST["number"]);
   }

?>
<?php
echo $name;
echo "<br>";
echo $address;
echo "<br>";
echo $designation;
echo "<br>";
echo $gender;
echo $number;
echo "<br>";
?>
