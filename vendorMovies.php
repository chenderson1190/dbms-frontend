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
$vendor_name = $_POST['table'];
$query="Create or Replace View vendorStock as Select VendorName, Name From Vendors V, Movies M Where VendorName = '$vendor_name' AND M.VID = V.VendorId;";
$query1 = "Select * from vendorStock;";

echo "<h1>The following displays the movies $vendor_name has</h1>";
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