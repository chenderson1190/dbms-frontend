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
          $store_name = $_POST['store'];
          $query0="CREATE OR REPLACE VIEW Rentable
          AS SELECT M.Name
          FROM Movies M,Stores S
          WHERE M.SID=S.SID AND M.SID=S.SID AND S.Name='$store_name';";
          $query1="SELECT * FROM Rentable;";
          echo "<h1>The following displays the stock of the $store_name store.</h1>";
          echo "<br>";
          mysqli_query($connect, $query0);
          display_db_query($query1, $connect,True,2);
          ?>
        </Td>

      </Tr>
    </Table>
    <!-- TODO: Make rentHandler.php -->
    <?php
    $resultSet = mysqli_query($connect, "Select Name from Rentable;");
     ?>
     <Form Method="post" Action="rentHandler.php">
     <select name="Movies">
       <?php
       while($rows = $resultSet->fetch_assoc())
       {
         $movie_name = $rows['Name'];
         echo "<option value='$movie_name'>$movie_name</option>";
       }
        ?>
     </select>
     <?php
     $resultSet = mysqli_query($connect, "Select CName from Customers;");
      ?>
      <Form Method="post" Action="rentHandler.php">
      <select name="Customers">
        <?php
        while($rows = $resultSet->fetch_assoc())
        {
          $cust_name = $rows['CName'];
          echo "<option value='$cust_name'>$cust_name</option>";
        }
        mysqli_close($connect);
         ?>
      </select>
     <input type="submit" name="Click to Rent!" value="Rent">
  </Body>
</Html>
