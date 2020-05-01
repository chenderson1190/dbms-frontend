<?php

include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);
?>
<Html>
<Head>
<Title>Hiring Employee Complete</Title>
</Head>
<Body>

<Table Border=0 cellPadding=10 Width=100%>

<Tr>

<Td BGColor="F0F8FF" Align=Center VAlign=top Width=17%> </Td>

<Td BGColor="FFFFFF" Align=Left VAlign=Top Width=83%>

<?php

$employee_Name = $_POST['Name'];
$employee_Loc = $_POST['employeeLoc'];
$employee_Pos = $_POST['employeePos'];
$employee_EID = $_POST['EID'];
$EID = (int)$employee_EID;

if ($employee_Loc == 'Plymouth') {
	$SID = 1001;
}
elseif ($employee_Loc == 'Bristol') {
	$SID = 1234;
}
elseif ($employee_Loc == 'Kaer Morhen') {
	$SID = 1456;
}
elseif ($employee_Loc == 'Tokyo') {
	$SID = 1534;
}
elseif ($employee_Loc == 'New York') {
	$SID = 1535;
}
elseif ($employee_Loc == 'Nottingham') {
	$SID = 4765;
}
elseif ($employee_Loc == 'Nether') {
	$SID = 6660;
}
elseif ($employee_Loc == 'Haverhill') {
	$SID = 6842;
}
elseif ($employee_Loc == 'City 17') {
	$SID = 7980;
}
elseif ($employee_Loc == 'Salado') {
	$SID = 8834;
}

echo "<h1>$employee_Name has been Hired.</h1>";
echo "<br>";

mysqli_query($connect, "Insert Into Employees(EID, SID, EName, Position) Values ($EID, $SID, '$employee_Name', '$employee_Pos')");

echo "<br>";
echo "Click back to return to the Manager page";
?>
<Form Method="post" Action="videoChainManager.html">
<input type="submit" name="Back" value="Back">

</Table>
</Body>
</Html>