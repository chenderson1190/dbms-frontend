<?php
	echo "<br>";
	echo "<h1>Want to Hire Someone? Fill out everything below and click Submit!</h1>";
?>
<Html>
<Head>
<Title>Terminate Employee</Title>
<link href="style.css" rel="stylesheet" Type="text/css">
</Head>
<Body>

<Table Border=0 cellPadding=10 Width=100%>

<Tr>

<Td BGColor="FFFF00" Align=Center VAlign=top Width=17%> </Td>

<Td BGColor="000000" Align=Left VAlign=Top Width=83%>

	<Form Method="post" Action="hireHandler.php">
<select name="employeeLoc" required>
<Option>Plymouth</Option>
<Option>Bristol</Option>
<Option>Kaer Morhen</Option>
<Option>Tokyo</Option>
<Option>New York</Option>
<Option>Nottingham</Option>
<Option>Nether</Option>
<Option>Haverhill</Option>
<Option>City 17</Option>
<Option>Manchester</Option>
<Option>Salado</Option>

</select>
<br>
<br>
<br>

	<Form Method="post" Action="hireHandler.php">
<select name="employeePos" required>
<Option>Staff-Member</Option>
<Option>Janitor</Option>
</select>
<br>
<br>
<br>

First and Last Name:
<Form Method="post" Action="hireHandler.php">
<Input Type="Name" Size=25 Name="Name">
<br>
<br>
<br>

EID:
<Form Method="post" Action="hireHandler.php">
<Input Type="EID" Size=4 Name="EID">
<br>
<br>
<br>

<Input Type="submit" Name="submit" Value="Submit">
</Form>
</Td>

</Table>
</Body>
</Html>
