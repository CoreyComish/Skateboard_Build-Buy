<!-- Skateboard Build & Buy PHP orderComplete Page -->
<!-- By Corey Comish -->
<?php
include('connectionData.txt');

$mysqli = new mysqli($server, $user, $pass, $dbname, $port);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MYSQL"; }
$firstName = mysqli_real_escape_string($mysqli, $_REQUEST['first_name']);
$lastName = mysqli_real_escape_string($mysqli, $_REQUEST['last_name']);
$address = mysqli_real_escape_string($mysqli, $_REQUEST['cust_address']);
$state = mysqli_real_escape_string($mysqli, $_REQUEST['cust_state']);
$zipcode = $_POST['cust_zip'];
$deckID = $_POST['deck_id'];
$truckID = $_POST['truck_id'];
$wheelID = $_POST['wheel_id'];
$bearingID = $_POST['bearing_id'];
$griptapeID = $_POST['griptape_id'];
$hardwareID = $_POST['hardware_id'];
$accessoryID = $_POST['accessory_id'];
$totalPrice = $_POST['total_price'];
$dateOrdered = $_POST['current_date'];
$orderNum = rand();
$customerNum = rand();

$orderQuery = "insert into orders (order_id, order_date, total_price) values ($orderNum, '$dateOrdered', $totalPrice)";
$mysqli->query($orderQuery);

$cusQuery = "insert into customer (customer_id, first_name, last_name, address, state, zipcode) select $customerNum, '$firstName', '$lastName', '$address', '$state', $zipcode where not exists (select * from customer where first_name = '$firstName' and last_name = '$lastName' and address = '$address')";
$mysqli->query($cusQuery);

?>                                                                                                                                                          
<html>
<head>
        <title> Skateboard Build & Buy </title>
</head>

<body bgcolor='grey'>

<h1> <center> Skateboard Build & Buy </center> </h1>
<h3> <center> Thank you for placing an order, below is your order and customer information! </center> </h3>

<hr> </hr>

<h2> <center>
	<?php
	$query = "select order_id, order_date, total_price from orders where order_id = ";
	$query = $query.$orderNum;
	$result = $mysqli->query($query);
	while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
       		 print "Order Number: $row[order_id], Date: $row[order_date], Price: $$row[total_price]"; }   
	?>
</h2> </center>

<h2> <center>
        <?php
	$query = "select customer_id, first_name, last_name, address, state, zipcode from customer where first_name = '$firstName' and last_name = '$lastName' and address = '$address'";
        $result = $mysqli->query($query);
        while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
		print "Customer Number: $row[customer_id], $row[first_name] $row[last_name], $row[address], $row[state], $row[zipcode]";
		$orderCustomerID = $row[customer_id];}
	$iQuery = "update orders set order_cust_id = $orderCustomerID where order_id = $orderNum";
	$mysqli->query($iQuery);
	?>
</h2> </center>

<?php
	$query = "insert into skateboard(deck_id, truck_id, wheel_id, bearing_id, griptape_id, hardware_id, accessory_id, customer_id, order_id) values ($deckID, $truckID, $wheelID, $bearingID, $griptapeID, $hardwareID, $accessoryID, $orderCustomerID, $orderNum)";
	$mysqli->query($query);
?>

<h3> <center> <a href="https://ix.cs.uoregon.edu/~ccomish/landing.php">Click Here to Buy Another Skateboard!</a></h3></center>

</html>
