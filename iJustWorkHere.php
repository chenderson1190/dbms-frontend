<?php
     include("phpbook-vars.inc");

     include("displayDBQueryField.inc");

     $database="Team1";

     $connect=mysqli_connect($hostname, $user, $password);

     mysqli_select_db($connect, $database);
?>
<Html>
     <Head>
          <?php
          $EID = $_POST['EID'];
          $query1="Select S.Name from Stores S, Employees E where E.EID='$EID' and E.SID= S.SID;";
          $result = mysqli_query($connect, $query1)->fetch_assoc();
          $store_name=$result['Name'];
          echo "<Title>$store_name Store</Title>"
          ?>
          <link rel="stylesheet" href="style.css">
     </Head>
     <Body>

          <Table Border=0 cellPadding=10 Width=100%>

               <Tr>

               <Td BGColor="FFFF00" Align=Center VAlign=top Width=17%> </Td>

               <Td BGColor="000000" Align=Left VAlign=Top Width=83%>

                    <?php
                         $query2 ="Select Position from Employees where EID='$EID';";
                         $new_result = mysqli_query($connect, $query2)->fetch_assoc();
                         $position=$new_result['Position'];

                         echo "<h1> $store_name store $position view</h1>";
                         echo "<hr><br>";
                         if($position!='Janitor'){
                              $query0="Select C.CName as 'Customer', R.Movie as 'Movies', R.DueDate as 'Due Date',R.RID as 'Rental ID#' From Customers C, Rentals R, Stores S Where S.Name = '$store_name' AND S.SID = R.SID AND R.CID = C.CID;";


                              echo "<p>$store_name business summary:</p>";
                              display_db_query($query0, $connect,True,2);



                              echo "<p>Select a rental to return it:</p>";

                              $query1 ="Select R.RID from Rentals R, Stores S where S.SID=R.SID and S.Name='$store_name';";
                              //display_db_query($query1, $connect,True,2);
                              $resultSet = mysqli_query($connect, $query1);
                              echo "<Form Method='post' Action='return.php'>";
                                   echo "<select name='rental_ID' required>";

                                             while($rows = $resultSet->fetch_assoc()){
                                                  $RIDs = $rows['RID'];
                                                  echo "<option value='$RIDs'>$RIDs</option>";
                                             }
                                             mysqli_close($connect);

                                   echo "</select>";
                                   echo "<br>";
                                   echo "<Input Type='submit' Name='submit' Value='Return Movie'>";
                              echo "</Form>";

                         }
                         else{
                              echo "<p>You cannot access the business summary.</p>";
                              echo "<br>";
                         }

                         if ($position!='Manager'){
                              echo "<Form Method='post' Action='quit.php'>";
                                   echo "<hr>";
                                   echo "<p>Click this button if you are sure you want to quit.</p>";
                                   //echo"<Select value ='$EID'></Select>";


                                   echo "<Input Type='submit' Name='EID' Value='$EID'>";
                              echo "</Form>";
                         }
                    ?>
               </Td>

               </Tr>
          </Table>
     </Body>
</Html>
