<?php
// This code is a handler for rentableMovies.php, it simply gathers the
// Post data from rentableMovies.php, and passes it to the database.
include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);

// Get the date.
$duedate = date_create();

// Add 7 days to the date.
date_add($duedate, date_interval_create_from_date_string('7 days'));

// Format the date as a string in Month/Day/Year format,
// To be consistent with the databse.
$duedate = date_format($duedate, 'm/d/Y');

$movie_name = $_POST['Movies'];
$cust_name = $_POST['Customers'];

// Insert the name of the movie and the duedate.
mysqli_query($connect, "Insert Into Rentals (Movie, DueDate) values ('$movie_name', '$duedate')");

// Using the Movies name, find the Movie ID and populate that part of the table.
mysqli_query($connect, "update Rentals, Movies set Rentals.MID=Movies.MID where Movie='$movie_name' AND Rentals.Movie=Movies.Name and DueDate='$duedate';");

// Now, Using the Customers name, find the Customers ID and populate that column.
mysqli_query($connect, "update Rentals, Customers set Rentals.CID=Customers.CID where DueDate='$duedate' AND Rentals.Movie='$movie_name' AND Customers.CName='$cust_name';");

// Finally, set the store ID to the store that the movie is associated with.
mysqli_query($connect, "Update Rentals, Movies set Rentals.SID=Movies.SID where Movie='$movie_name' AND Rentals.Movie=Movies.Name AND DueDate='$duedate';");

mysqli_close($connect);

header ("refresh:1; url=videoChainCustomer.html");
?>
