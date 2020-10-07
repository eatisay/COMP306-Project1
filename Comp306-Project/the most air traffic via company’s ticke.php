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

$result = mysqli_query($con,"select count(A.city) as Count,city
from FliesTo natural join FliesFrom natural join Ticket,Airport as A
where 
(departure_airport=A.airport_name or arrival_airport=A.airport_name) and '2016-03-07'<date<'2018-06-12'
group by A.city 
  order by Count desc limit 1


");

echo "<table border='1'>
<tr>
<th>Count</th>
<th>city</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Count'] . "</td>";
  echo "<td>" . $row['city'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
