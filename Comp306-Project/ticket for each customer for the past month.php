<?php
// Create connection
// replace agursoy with your mysql username
// replace agursoy with your database name (username_db)
// replace <yourpasswordhere> with your password
$con=mysqli_connect("localhost","group9","group9comp306","group9");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// display result in an HTML table

$result = mysqli_query($con,"select C.user_name as CustomerName, departure_airport,arrival_airport,departure_date,arrival_date,airplane_id
from Customer as C,FliesTo natural join FliesFrom natural join Ticket as T natural join Flight
where C.customer_id=T.customer_id

");

echo "<table border='1'>
<tr>
<th>CustomerName</th>
<th>departure_airport</th>
<th>arrival_airport</th>
<th>departure_date</th>
<th>arrival_date</th>
<th>airplane_id</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CustomerName'] . "</td>";
  echo "<td>" . $row['departure_airport'] . "</td>";
  echo "<td>" . $row['arrival_airport'] . "</td>";
  echo "<td>" . $row['departure_date'] . "</td>";
  echo "<td>" . $row['arrival_date'] . "</td>";
  echo "<td>" . $row['airplane_id'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
