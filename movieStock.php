<?php
include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);
?>
<Html>
<Head>
<Title>Die Hard Stock</Title>
</Head>
<Body>

<Table Border=0 cellPadding=10 Width=100%>

<Tr>

<Td BGColor="F0F8FF" Align=Center VAlign=top Width=17%> </Td>

<Td BGColor="FFFFFF" Align=Left VAlign=Top Width=83%>

<?php
$movie_name = $_POST['movie'];
$query="Create or Replace View movieStock as Select VendorName, M.Name, M.Stock From Vendors V, Movies M Where M.Name = '$movie_name' AND M.VID = V.VendorId;";
$query1 = "Select * from movieStock;";

echo "<h1>The following displays the stock of $movie_name from which vendor</h1>";
echo "<br>";

mysqli_query($connect, $query);
display_db_query($query1, $connect,True,2);

mysqli_close($connect);
?>
</Td>

</Tr>
</Table>
</Body>
</Html>
