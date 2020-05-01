<?php
include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);

$name=$_POST['name'];
$phoneNumber=$_POST['phone'];

mysqli_query($connect, "insert into Customers (CName, Phone) values ('$name','$phoneNumber')");

header ("refresh:1; url=videoChainCustomer.html");

?>
