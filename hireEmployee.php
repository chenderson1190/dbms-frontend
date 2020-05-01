<?php
	echo "<br>";
	echo "<h1>Want to Hire Someone? Fill out everything below and click Submit!</h1>";
?>
<br>
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

