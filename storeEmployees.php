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
	$query = "Create or Replace View employeeTable as Select Distinct S.Name, Position, EName, EID From Stores S,
	Employees E Where S.SID = E.SID AND S.Name = '$store_employeeLoc';";
	$query1 = "Select * from employeeTable;";
	echo "<h1>The following displays all employees of $store_employeeLoc</h1>";
}

else {
$query="Create or Replace View employeeTable as Select Distinct S.Name, Position, EName, EID From Stores S,
 Employees E Where S.SID = E.SID AND S.Name = '$store_employeeLoc'
 AND E.Position = '$employeePos';";
 $query1 = "Select * from employeeTable;";
echo "<h1>The following displays the $employeePos of $store_employeeLoc</h1>";
}

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
