<?php

include("phpbook-vars.inc");

include("displayDBQueryField.inc");

$database="Team1";

$connect=mysqli_connect($hostname, $user, $password);

mysqli_select_db($connect, $database);
?>
<Html>
<Head>
<Title>Terminate Employee Complete</Title>
</Head>
<Body>

<Table Border=0 cellPadding=10 Width=100%>

<Tr>

<Td BGColor="F0F8FF" Align=Center VAlign=top Width=17%> </Td>

<Td BGColor="FFFFFF" Align=Left VAlign=Top Width=83%>

<?php

$employee_Name = $_POST['EmployeeName'];

$query = "Delete from Employees Where EName = '$employee_Name';";
echo "<h1>$employee_Name has been terminated.</h1>";
echo "<br>";

mysqli_query($connect, $query);
mysqli_close($connect);
echo "<br>";
echo "Click back to return to the Manager page";
?>
<Form Method="post" Action="videoChainManager.html">
<input type="submit" name="Back" value="Back">

</Table>
</Body>
</Html>