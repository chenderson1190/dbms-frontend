<?php
     include("phpbook-vars.inc");

     include("displayDBQueryField.inc");

     $database="Team1";

     $connect=mysqli_connect($hostname, $user, $password);

     mysqli_select_db($connect, $database);
?>
<Html>
     <Head>
          <Title>You just quit. Weak.</Title>
          <link rel="stylesheet" href="style.css">
     </Head>
     <Body>

          <Table Border=0 cellPadding=10 Width=100%>

               <Tr>

               <Td BGColor="FFFF00" Align=Center VAlign=top Width=17%> </Td>

               <Td BGColor="000000" Align=Left VAlign=Top Width=83%>

                    <?php

                         $employee_ID = $_POST['EID'];

                         $query0 = "Select * from Employees where EID = '$employee_ID';";
                         $query1 = "Delete from Employees Where EID = '$employee_ID';";
                         echo "<h1>Employee $employee_ID has quit.</h1>";
                         echo "<br>";

                         display_db_query($query0, $connect,True,2);
                         mysqli_query($connect, $query1);
                         mysqli_close($connect);
                         echo "<br>";
                         echo "Click back to return to the Home page";
                    ?>
                    <Form Method="post" Action="videoChainEmployee.html">
                    <input type="submit" name="Back" value="Back">
               </Td>
          </Table>
     </Body>
</Html>
