<?php
include 'connectDB.php';
session_start();
if ($_GET['finish']=='yes')
{
$id = $_GET['ID'];
$appID = $_GET['appID'];


$delete = "DELETE FROM `AppRecordClient` WHERE `Appointment ID`='$appID'";
$sql = "SELECT * FROM `AppRecordClient` WHERE `Appointment ID`='$appID' AND `Client ID`='$id'";

$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) >= 1){
      mysqli_query($link, $delete);
      echo ' <script>alert("Appointment Canceled");</script> ';
      }
      
else { 
echo "<script>alert('Client ID or Appointment ID not found');</script>";
}    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cancel Appointment</title>

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
<h1 class=vis>Cancel an Appointment</h1>

<form action="<!-- Link to CancelApp.php file -->" method="get">
<div>
            <p style="padding: 10px; border: 10px solid tomato; text-align: center;" >
  
            <label class=vis for="id">Client's ID # </label> 
            <input id="id" type="text" name="ID" required/>
            <br><br>
            <label class=vis for="id">Client Appointment # </label> 
            <input id="appID" type="text" name="appID" required/>
            <br><br>
            <input id="finish" type="hidden" name="finish"/>
            <button type="submit" value="Submit" onclick="sure()">Submit </button>
            <button type="reset" value="reset">Reset</button> 
            </p>

            
</div>
</form>
<script>
function sure(){
if (confirm("Cancel the order?(press ok)")==true){
     document.getElementById("finish").value = "yes";
  }
  else{
     document.getElementById("finish").value = "yegfsz";
  }
}
</script>
</body>
</html>