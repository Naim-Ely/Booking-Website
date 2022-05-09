<?php
//Makes DB connection
$servername = "/*servername*/";
$username = "/*your username*/";
$password = "/*your password*/";
$dbname = "/*database name*/";
$link = mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
