<?php
// The following function displays the result of a query,
// using a connection $connection
// Set $Head to True if we want the column names
// Set $Board to 1 through 5,depending on the style
function display_db_table( $tablename, $connect) {
# Define basic query with $tablename.
$query = "SELECT * FROM $tablename";
# Call the workhorse to display the result
# with head and appropriate board
display_db_query( $query, $connect, True, 2);
}
function display_db_query( $query, $connect, $Head, $Border ) {
//Show the query itself
echo "<h2>The query is: $query</h2>";
echo "<br>";
echo "<h2>The result for this query is as follows:<h2>";
echo "<br>";
# 4. Get the result of the query
$result = mysqli_query( $connect, $query);
# Put the table in the center
print ("<center>");
# 5. Start the table with an appropriate style
# as specified via $Border
print( "<table border=$Border>\n" );
# Print the top row if need, i.e., Head is true
If($Head){
print( "<tr>\n" );
while ($fieldinfo=mysqli_fetch_field($result))
printf("<td><b>$fieldinfo->name</b></td>");
print( "</tr>\n" );
}
# 6. Loop through the results returned from the query
while( $row = $result->fetch_assoc() ) {
# Start a table Row
# Retrieve the associateive array keys from the row
$columns = array_keys( $row );
# 7. Loop through each column from the table, pulling the data
# out and printing it using a loop of the keys
# we just extracted
foreach( $columns as $column ) {
print( "<td>{$row[$column]}</td>" );
}//end foreach
# 8. Close the table row
print( "</tr>\n" );
}//end while loop
# Print the end of the table
print( "</table>\n" );
print ("</center>");
}
?>
