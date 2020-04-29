<?php
include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);
?>
<Html>
<Head>
<Title>Rent a Movie!</Title>
</Head>
<Body>

<Table Border=0 cellPadding=10 Width=100%>

<Tr>

<Td BGColor="F0F8FF" Align=Center VAlign=top Width=17%> </Td>

<Td BGColor="FFFFFF" Align=Left VAlign=Top Width=83%>

<?php
//$movie_name = $_POST['movie'];
$query0='Create or Replace View Rentable 
as select M.Name 
from Movies M,Stores S 
where M.SID=S.SID and M.SID=S.SID and S.Name="Kaer Morhen";';
$query1="SELECT * FROM Rentable;";
echo "<h1>The following displays the stock of plymouth store depending on which store is selected.</h1>";
echo "<br>";
mysqli_query($connect, $query0);
display_db_query($query1, $connect,True,2);

mysqli_close($connect);
?>
</Td>

</Tr>
</Table>
</Body>
</Html>
