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
$store_employeeLoc = $_POST['employeeLoc'];
$employeePos = $_POST['employeePos'];

if ($employeePos == 'All'){
	$query="Select Distinct S.Name, Position, EName From Stores S,
	Employees E Where S.SID = E.SID AND S.Name = '$store_employeeLoc';";
	echo "<h1>The following displays all employees of $store_employeeLoc</h1>";
}

else {
$query="Select Distinct S.Name, Position, EName From Stores S,
 Employees E Where S.SID = E.SID AND S.Name = '$store_employeeLoc'
 AND E.Position = '$employeePos';";
echo "<h1>The following displays the $employeePos of $store_employeeLoc</h1>";
}

echo "<br>";

display_db_query($query, $connect,True,2);

mysqli_close($connect);
?>
</Td>

</Tr>
</Table>
</Body>
</Html>