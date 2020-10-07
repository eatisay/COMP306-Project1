<?php
include 'auth.php';
include 'queries.html';


$query = $_POST['queries'];

if($query == "Find the customer who has been flighted the most distance in two years ago."){
	$sql = 'select C.customer_name,max(SSK.Distance) as M
from 
customer as C,(select (FF.arrival_date-FF.departure_date) as Distance, T.customer_id
		from (FliesTo natural join FliesFrom natural join Ticket) as FF,Ticket as T) as SSK
where SSK.customer_id=C.customer_id and SSK.date>01.01.2016 and SSK.date<01.01.2017
group by C.customer_name desc 1';

$result = $conn -> query($sql);
echo "customer_name"."".
"M". "<hr>";
if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {
        echo  $row["customer_name"]." ". $row["M"]. "<br>";
      }
    } else {
 		echo "no results";
    }
}else if($query == "Find the customer who has spent the most money on buying tickets last year."){
	$sql = 'select sum(amount) as totA,user_name
from ticket,customer
where ticket natural join customer
group by user_name -1 desc';

$result = $conn -> query($sql);
echo "user_name"."".
"totA". "<hr>";
if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {
        echo  $row["user_name"]." ". $row["totA"]. "<br>";
      }
    } else {
 		echo "no results";}
}else if($query == "Find the customer who has bought the longest duration of flight ticket."){
	$sql = 'select max(SSK.Distance) as LongestDuration,C.customer_name
from 
(select (FF.arrival_date-FF.departure_date) as Distance, T.customer_id
from (FliesTo natural join FliesFrom natural join Ticket) as FF,Ticket as T

) as SSK, customer as C
where C.customer_id=SSK.customer_id
group by customer_name';

$result = $conn -> query($sql);
echo "LongestDuration"."".
"customer_name". "<hr>";
if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {
        echo  $row["LongestDuration"]." ". $row["Customer_Name"]. "<br>";
      }
    } else {
 		echo "no results";}
}else if($query == "Find the Airline Company who has sold the shortest duration of flight ticket."){
	$sql = 'select min(SSK.Distance) as M,airway_name
from (select (FF.arrival_date-FF.departure_date) as Distance, T.customer_id
from (FliesTo natural join FliesFrom natural join Ticket) as FF,Ticket as T) as SSK,airway,flight
where SSK.flight_id=flight.flight_id and airway.airway_id=flight.airway_id
group by airway_name -1';

$result = $conn -> query($sql);
echo "M"."".
"airway_name". "<hr>";
if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)) {
        echo  $row["M"]." ". $row["airway_name"]. "<br>";
      }
    } else {
 		echo "no results";}

}



?>