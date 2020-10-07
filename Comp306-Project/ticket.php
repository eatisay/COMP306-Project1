<?php

include 'connect.php';
include 'customer.html';


$bill_date = $_POST["bill"];
$c_id = $_POST["id"];
$c_name =	$_POST["name"];
$address =	$_POST["addr"];
$phone =	$_POST["phone"];
$f_no = $_POST["f"];
$seat = $_POST["seat"];
$departure = $_POST["dep"];
$arrival = $_POST["arr"];
$company = $_POST["c"];
$price = $_POST["pr"];
$ticket = rand(50000,100000);

echo '<!DOCTYPE html>';
echo '<html>';
echo '<body>';
echo '<h1>Ticket</h1>';
echo '</body>';
echo '</html>';

echo "Bill Date:"." "."$bill_date"."<br>";
echo "Customer ID:"." "."$c_id". "<br>";
echo "Customer Name:"." "."$c_name". "<br>";
echo "Customer Address:"." "."$address". "<br>";
echo "Customer Phone Number:"." "."$phone". "<br>";
echo "Flight Number:"." "."$f_no". "<br>";
echo "Seat Type:"." "."$seat". "<br>";
echo "Departure Time:"." "."$departure". "<br>";
echo "Arrival Time:"." "."$arrival". "<br>";
echo "Company:"." "."$company". "<br>";
echo "Price:"." "."$price". "<br>";

$con=mysqli_connect("localhost","group9","group9comp306","group9");

// Check connection
if (!$con)
  {
    die("Connection failed: " . mysqli_connect_error());
  }

$sql = "INSERT INTO Ticket(ticket_id,date,flight_id,customer_id,seatType,amount)
VALUES($ticket,$departure,$f_no,$c_id,$seat,$price)";

if(mysqli_query($con,$sql)){
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>
