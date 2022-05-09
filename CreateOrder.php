<?php
include 'connectDB.php';
session_start();
if (isset($_GET['FirstName']))
{
$first = $_GET['FirstName'];
$last = $_GET['LastName'];
$id = $_GET['ID'];
$appID = $_GET['appID'];
$prod = $_GET['Product'];
$address = $_GET['Address'];

$stylist=$_SESSION['id'];

$orderID = rand(50,1000);

$insert = "INSERT INTO `Client Order Record`(`Client ID`, `Stylist ID`, `Appointment ID`, `Order Number`, `Shipping Address`, `Product Type and Quantity`) VALUES ('$id','$stylist','$appID','$orderID','$address','$prod')";
$sql = "SELECT * FROM `Client Records` WHERE `Client First Name`='$first' AND `Client Last name`='$last' AND `Client ID`='$id'";
$appIDcheck = "SELECT * FROM `AppRecordClient` WHERE `Appointment ID`='$appID'";

$check = mysqli_query($link, $appIDcheck);

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) >= 1){
    if(mysqli_num_rows($check) >= 1){
      mysqli_query($link, $insert);
      echo "<script>alert('Order Placed');</script>";
    }
    else {
      echo "<script>alert('Appointment ID not found');</script>";
    }
}
else { 
echo "<script>alert('Client not found');</script>";
}    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Place Order</title>
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
<h1 class=vis>Place an Order</h1>

<form action="<!-- Link to CreateOrder.php file -->" method="get">
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
            <label class=vis for="id">Client Appointment ID</label> 
            <input id="id" type="text" name="appID" required/>
            <br><br>
            <label class=vis for="id">Product Order</label> 
            <input id="id" type="text" name="Product" required/>
            <br><br>
            <label class=vis for="id">Shipping Address</label> 
            <input id="id" type="text" name="Address" required/>
            <br><br>
            <button type="submit" value="Submit">Submit </button>
            <button type="reset" value="reset">Reset</button> 
            </p>

            
</div>
</form>
</body>
</html>