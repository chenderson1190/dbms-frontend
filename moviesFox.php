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

$query="Select VendorName, Name From Vendors V, Movies M Where VendorName = '20th Century Fox' AND M.VID = V.VendorId;";
echo "<h1>The following displays the movies '20th Century Fox' has</h1>";
echo "<br>";

display_db_query($query, $connect,True,2);

mysqli_close($connect);
?>
</Td>

</Tr>
</Table>
</Body>
</Html>