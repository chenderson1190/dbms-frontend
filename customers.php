<?php

include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);
?>
<Html>
<Head>
<Title>Customers</Title>
</Head>
<Body>

<Table Border=0 cellPadding=10 Width=100%>

<Tr>

<Td BGColor="F0F8FF" Align=Center VAlign=top Width=17%> </Td>

<Td BGColor="FFFFFF" Align=Left VAlign=Top Width=83%>

<?php
$table_name = $_POST['table'];
$query="Select Distinct CName From Customers C, Rentals R, Stores S Where S.Name = '$table_name' AND S.SID = R.SID AND R.CID = C.CID";
echo "<h1>The following displays the customers from the $table_name Store</h1>";
echo "<br>";

display_db_query($query, $connect,True,2);

mysqli_close($connect);
?>
</Td>

</Tr>
</Table>
</Body>
</Html>