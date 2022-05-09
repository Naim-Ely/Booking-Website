<?php
include 'connectDB.php';
session_start();
if ($_GET['finish']=='yes')
{

$first = $_GET['FirstName'];
$last = $_GET['LastName'];
$pass = $_GET['Password'];
$id = $_GET['ID'];
$phone = $_GET['PhoneNumber'];
$email = $_GET['Email'];
$trans = $_GET['transaction'];

$_SESSION["fName"] =$first;
$_SESSION["lName"] =$last;
$_SESSION["pass"] =$pass;
$_SESSION["id"] =$id;
$_SESSION["phone"] =$phone;

$sql = "SELECT * FROM `Stylists Records` WHERE `Stylist First Name`='$first' AND `Stylist Last Name`='$last' AND `Stylist Password`='$pass' AND `Stylist ID`='$id' AND `Stylist Phone Number`='$phone'";
$_SESSION["Stylist"] = $sql;
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        if($trans=='Search'){
           header("Location:/*link to DisplayStyle.php file*/");
        }
        elseif($trans=='Book'){
           header("Location:/*link to CreateApp.php file*/");
        }
        elseif($trans=='Place'){
           echo '<script> var r = confirm("You need an apointment to place an order. Continue if you have an appointment"); </script>';
           echo ' <script>if (r == true) {window.location.replace("/*link to  CreateOrder.php file*/");} else {window.location.replace("/*link to CreateApp.php file*/");}</script> ';
        }
        elseif($trans=='Update'){
           header("Location:/*link to UpdateOrder.php file*/");
        }
        elseif($trans=='cOrder'){
           header("Location:https:/*link to CancelOrder.php file*/");
        }
        elseif($trans=='cApp'){
           header("Location:/*link to CancelApp.php file*/");
        }
        elseif($trans=='Create'){
           header("Location:/*link to CreateClient.php file*/");
        }
    } 
    else{
        echo "<script>alert('Stylist Not Found');</script>";
    }
}
mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Assignment 4</title>

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
</style>
</head>
<body>
<h1 class=vis>The Art Of Hair Registration</h1>
<h1>

</h1>
<form action="<!-- link to Homepage file -->" method="get">
<div>
            <p style="padding: 10px; border: 10px solid tomato; text-align: center;" >
            <label  class=vis for="first">Stylist's First Name</label> 
            <input id="first" type="text" name="FirstName" required/> 
            <br><br>
            <label class=vis for="last">Stylist's Last Name</label> 
            <input id="last" type="text" name="LastName" required/>
            <br><br>
            <label class=vis for="password">Stylist's Password </label> 
            <input id="password" type="text" name="Password" required/>
            <br><br>
            <label class=vis for="id">Stylist's ID # </label> 
            <input id="id" type="text" name="ID" required/>
            <br><br>
            <label class=vis for="phone">Stylist's Phone Number </label> 
            <input id="phone" type="text" name="PhoneNumber" required/>
            <br><br>
            <label class=vis for="email">Stylist's Email </label> 
            <input id="email" type="text" name="Email" /> 
            <br><br>
            <label class=vis for="checkBox"> Include Email?</label>
            <input type="checkbox" id="incEmail" name="CheckboxEmail" value="include"/>
            <br><br>
            <input id="finish" type="hidden" name="finish"/>
            <label class=vis for="transaction">Select a transaction:</label>
  	    <select name="transaction" id="trans">
    		<option value="Search">Search a Stylist's account</option>
    		<option value="Book">Book a Client's appointment</option>
    		<option value="Place">Place a Client's order</option>
    		<option value="Update">Update a Client's order</option>
                <option value="cApp">Cancel a Client's appointment</option>
                <option value="cOrder">Cancel a Client's order</option>
                <option value="Create">Create a new Client's account</option>
 	    </select>
 	    <br><br>
            <button type="submit" value="Submit" onclick="validate()">Submit </button>
            <button type="reset" value="reset">Reset</button> 
            </p>

            
</div>
</form>
<script>
function validate() 
{
  let validation = 0;
  let firstName = document.getElementById("first").value;
  let lastName = document.getElementById("last").value;
  let password = document.getElementById("password").value;
  let id = document.getElementById("id").value;
  let phone = document.getElementById("phone").value;
  let email = document.getElementById("email").value;
  let include = document.getElementById("incEmail").value;
  passwordTest(password);
  idTest(id);
  phoneTest(phone);
  if (includeTest()==true)
  {
  	emailTest(email);
  }

  if (validation==0){
     document.getElementById("finish").value = "yes";
  }
  else{
     document.getElementById("finish").value = "yegfsz";
  }
  let trans = document.getElementById("trans").value;
}

function phoneTest(phone)
{
    phone=phone.split(" ").join("")
    phone=phone.split("-").join("")
    if (phone.length<10)
    {
    	alert("Phone Number should be a series of 10 numbers");
        validation++;
        exit();
    }
    else if (/[a-z]/.test(phone)==true)
    {
    	alert("Phone number must not contain letters");
        validation++;
        exit();
    }
    else if (/[~`!#$%\@^&*+=\-\[\]\\';,/{}|\\":<>\?]/.test(phone)==true)
    {
    	alert("Phone number must not contain special Characters");
        validation++;
        exit();
    }
}     
function passwordTest(password)
{
    if (password.length>10)
    {
    	alert("Password should be 10 characters maximum");
        validation++;
        exit();
    }
    else if (/\d/.test(password)==false)
    {
    	alert("Password must contain at least one number");
        validation++;
        exit();
    }
    else if (/[A-Z]/.test(password)==false)
    {
    	alert("Password must contain at least one capital letter");
        validation++;
        exit();
    }
    else if (/[~`!#$%\^@&*+=\-\[\]\\';,/{}|\\":<>\?]/.test(password)==false)
    {
    	alert("Password must contain at least one special character");
        validation++;
        exit();
    } 
}
function idTest(id)
{ 
    if (id.length!=8)
    {
    	alert("ID should be an eight-digit number");
        validation++;
        exit();
    }
    for (var x=0; x<id.length; x++)
    {
	if ("1234567890".includes(id[x]))
	{
	   continue;
	}
	else
	{
	   alert("ID should only include numbers");
           validation++;
       	   exit();
	}
    }
}
function includeTest()
{
       if (document.getElementById("incEmail").checked)
    {
    	document.getElementById("email").required = true;
        return true;
    }
    else
    {
    	document.getElementById("email").required = false;
        return false;
    }
}
function emailTest(email)
{
    
    if (/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)==false)
    {
    	alert("Email is not in the correct form");
        validation++;
        exit();
    }
}	
</script>
</body>
</html>
