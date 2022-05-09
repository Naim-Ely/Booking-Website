<?php
include 'connectDB.php';
session_start();
if (isset($_GET['ID']))
{
$id = $_GET['ID'];
$orderID = $_GET['orderID'];
$newOrder = $_GET['newOrder'];

$update = "UPDATE `Client Order Record` SET `Product Type and Quantity`='$newOrder' WHERE `Order Number`='$orderID'";
$sql = "SELECT * FROM `Client Records` WHERE `Client ID`='$id'";
$orderIDcheck = "SELECT * FROM `Client Order Record` WHERE `Order Number`='$orderID' AND `Client ID`='$id'";

$check = mysqli_query($link, $orderIDcheck);

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) >= 1){

    if(mysqli_num_rows($check) >= 1){
      mysqli_query($link, $update);
      echo "<script>alert('Order Updated');</script>";
    }
    else {
      echo "<script>alert('Order ID not found');</script>";
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
<title>Update Order</title>

<style>
body {
  background-image: url('<!-- Link to CreateOrder.php file -->');
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
<h1 class=vis>Update an existing Order</h1>

<form action="<!-- Link to UpdateOrder.php file -->" method="get">
<div>
            <p style="padding: 10px; border: 10px solid tomato; text-align: center;" >
  
            <label class=vis for="id">Client's ID # </label> 
            <input id="id" type="text" name="ID" required/>
            <br><br>
            <label class=vis for="id">Client Order # </label> 
            <input id="orderID" type="text" name="orderID" required/>
            <br><br>
            <label class=vis for="id">Updated Order </label> 
            <input id="order" type="text" name="newOrder" required/>
            <br><br>
            <button type="submit" value="Submit">Submit </button>
            <button type="reset" value="reset">Reset</button> 
            </p>

            
</div>
</form>
</body>
</html>