<?php
include 'connectDB.php';
if (isset($_GET['FirstName']))
{
$first = $_GET['FirstName'];
$last = $_GET['LastName'];
$id = $_GET['ID'];

$insert = "INSERT INTO `Client Records`(`Client First Name`, `Client Last name`, `Client ID`) VALUES ('$first','$last','$id')";
$sql = "SELECT * FROM `Client Records` WHERE `Client First Name`='$first' AND `Client Last name`='$last' AND `Client ID`='$id'";

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) >= 1){
    echo "<script>alert('Customer already on file');</script>";
    }
else {
mysqli_query($link, $insert);
echo "<script>alert('Customer Account succesfully created');</script>";
}    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Client</title>
<style>
body {
  background-image: url('<!-- Link to background image -->');
}
.vis {
  background-color: tomato;
  color: white;
  border: 2px solid black;
  text-align: center;
}
.btn-group button {
  background-color: tomato; 
  color: white; 
  padding: 10px 24px; 
  cursor: pointer; 
  float: left; 
}

.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none;
}

</style>
</head>
<body>

<div class="btn-group">
<form  action="DisplayStyle.php">
  <button>Stylist's Record</button>
</form>
<form  action="CreateClient.php">
  <button>Create Client Account</button>
</form>
<form  action="CreateApp.php">
  <button>Create an Appointment</button>
</form>
<form  action="CreateOrder.php">
  <button>Create an Order</button>
</form>
<form  action="UpdateOrder.php">
  <button>Update Order</button>
</form>
<form  action="CancelApp.php">
  <button> Cancel an Appointment </button> 
</form>
<form  action="CancelOrder.php">
<button> Cancel an Order</button>
</form>
</div>
<h1 class=vis>Create A Client Account</h1>
<h1>

</h1>
<form action="<!-- Link to CreateClient.php file -->" method="get">
<div>
            <p style="padding: 10px; border: 10px solid tomato; text-align: center;" >
            <label  class=vis for="first">Client's First Name</label> 
            <input id="first" type="text" name="FirstName" required/> 
            <br><br>
            <label class=vis for="last">Client's Last Name</label> 
            <input id="last" type="text" name="LastName" required/>
            <br><br>
            <label class=vis for="id">Client's ID # </label> 
            <input id="id" type="text" name="ID" required/>
            <br><br>
            <button type="submit" value="Submit">Submit </button>
            <button type="reset" value="reset">Reset</button> 
            </p>

            
</div>
</form>
</body>
</html>