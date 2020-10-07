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

$result = mysqli_query($con,"select CU.customer_id as CUID
from  (select max(C.purchaseNo) as pN
        from  Customer as C natural join isKindOfUser as K
          where K.type='VIP') as Z, Customer as CU
where CU.purchaseNo=Z.pN

");

echo "<table border='1'>
<tr>
<th>CUID</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['CUID'] . "</td>";
  echo "</tr>";
  }
echo "</table>";


mysqli_close($con);
?>
