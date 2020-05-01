<?php
include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);

$duedate = date_create();
date_add($duedate, date_interval_create_from_date_string('7 days'));
$duedate = date_format($duedate, 'm/d/Y');
//$duedate = strtotime("+7 day", $date);

$movie_name = $_POST['Movies'];
$cust_name = $_POST['Customers'];
mysqli_query($connect, "Insert Into Rentals (Movie, DueDate) values ('$movie_name', '$duedate')");
mysqli_query($connect, "update Rentals, Movies set Rentals.MID=Movies.MID where Movie='$movie_name' AND Rentals.Movie=Movies.Name and DueDate='$duedate';");
mysqli_query($connect, "update Rentals, Customers set Rentals.CID=Customers.CID where DueDate='$duedate' AND Rentals.Movie='$movie_name' AND Customers.CName='$cust_name';");
mysqli_query($connect, "Update Rentals, Movies set Rentals.SID=Movies.SID where Movie='$movie_name' AND Rentals.Movie=Movies.Name AND DueDate='$duedate';");

mysqli_close($connect);
header ("refresh:1; url=videoChainCustomer.html");
?>
