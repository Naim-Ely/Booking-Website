<link rel="stylesheet" href="tableCss.css"/>
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
<?php
session_start();
include 'connectDB.php';
$id = $_SESSION["id"];
$sql = "SELECT * FROM `Stylists Records` INNER JOIN `Client Order Record` INNER JOIN `Client Records` INNER JOIN `AppRecordClient` WHERE `Stylists Records`.`Stylist ID`=`Client Order Record`.`Stylist ID` AND `AppRecordClient`.`Stylist ID`=`Client Order Record`.`Stylist ID` AND `Stylists Records`.`Stylist ID`='$id'AND `Client Records`.`Client ID`=`AppRecordClient`.`Client ID` AND `AppRecordClient`.`Appointment ID`=`Client Order Record`.`Appointment ID`";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Stylist First Name</th>";
                echo "<th>Stylist Last Name</th>";
                echo "<th>Stylist Password</th>";
                echo "<th>Stylist ID</th>";
                echo "<th>Stylist Phone Number</th>";
                echo "<th>Stylist Email</th>";
                echo "<th>Client First Name</th>";
                echo "<th>Client Last Name</th>";
                echo "<th>Client ID</th>";
                echo "<th>Appointment Type</th>";
                echo "<th>Date and Time</th>";
                echo "<th>Appointment ID</th>";
                echo "<th>Product</th>";
                echo "<th>Shipping Address</th>";
                echo "<th>Order Number</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
		echo "<td>" . $row[4] . "</td>";
                echo "<td>" . $row[5] . "</td>";
                echo "<td>" . $row[12] . "</td>";
		echo "<td>" . $row[13] . "</td>";
                echo "<td>" . $row[14] . "</td>";
		echo "<td>" . $row[15] . "</td>";
                echo "<td>" . $row[16] . "</td>";
		echo "<td>" . $row[19] . "</td>";
                echo "<td>" . $row[11] . "</td>";
		echo "<td>" . $row[10] . "</td>";
                echo "<td>" . $row[9] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        mysqli_free_result($result);
    } else{
        echo '<script>alert("No Stylists Were Founds")</script>';
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);
?>