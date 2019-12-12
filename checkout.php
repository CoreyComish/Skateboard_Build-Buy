<!-- Skateboard Build & Buy PHP Checkout Page -->
<!-- By Corey Comish -->                                                                                                                                           <?php
include('connectionData.txt');
                                                                                                                                                                   $mysqli = new mysqli($server, $user, $pass, $dbname, $port);
if ($mysqli->connect_errno) {               
	echo "Failed to connect to MYSQL"; }

$deckName = $_POST['deck_select'];
$truckName = $_POST['truck_select'];
$wheelName = $_POST['wheel_select'];
$bearingName = $_POST['bearing_select'];
$griptapeName = $_POST['griptape_select'];
$hardwareName = $_POST['hardware_select'];
$accessoryName = $_POST['accessory_select'];
?>

<html>
<head>
        <title> Skateboard Build & Buy </title>
</head>

<body bgcolor='grey'>

<h1> <center> Skateboard Build & Buy </center> </h1>
<h3> <center> Review the order and enter in your customer information, click 'Submit' to send your order! </center> </h3>

<hr> </hr>

<h2> Deck:
	<?php
		$query = "select deck_id, deck_brand, deck_name, deck_width, deck_length, deck_price from decks where deck_name = ";
		$query = $query."'".$deckName."'";
		$result = $mysqli->query($query);
		while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			print "$row[deck_brand], $row[deck_name], Width: $row[deck_width]in, Length: $row[deck_length]in, $$row[deck_price]";
			$deck_price = $row[deck_price];
			$deck_id = $row[deck_id];
		}

	?>
</h2>

<h2> Trucks:
        <?php
                $query = "select truck_id, truck_brand, truck_name, truck_size, truck_price from trucks where truck_name = ";
                $query = $query."'".$truckName."'";
                $result = $mysqli->query($query);
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			print "$row[truck_brand], $row[truck_name], Size: $row[truck_size]in, $$row[truck_price]";
			$truck_price = $row[truck_price];
			$truck_id = $row[truck_id];
                }
        ?>
</h2>

<h2> Wheels:
        <?php
                $query = "select wheel_id, wheel_brand, wheel_name, wheel_size, wheel_hardness, wheel_price from wheels where wheel_name = ";
                $query = $query."'".$wheelName."'";
                $result = $mysqli->query($query);
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			print "$row[wheel_brand], $row[wheel_name], Size: $row[wheel_size]mm, Hardness: $row[wheel_hardness], $$row[wheel_price]";
			$wheel_price = $row[wheel_price];
			$wheel_id = $row[wheel_id];
                }
        ?>
</h2>

<h2> Bearings:
        <?php
                $query = "select bearing_id, bearing_brand, bearing_name, bearing_size, bearing_price from bearings where bearing_name = ";
                $query = $query."'".$bearingName."'";
                $result = $mysqli->query($query);
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			print "$row[bearing_brand], $row[bearing_name], Size: $row[bearing_size]mm, $$row[bearing_price]";
			$bearing_price = $row[bearing_price];
			$bearing_id = $row[bearing_id];
                }
        ?>
</h2>

<h2> Griptape:
        <?php
                $query = "select griptape_id, griptape_brand, griptape_name, griptape_price from griptape where griptape_name = ";
                $query = $query."'".$griptapeName."'";
                $result = $mysqli->query($query);
                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
			print "$row[griptape_brand], $row[griptape_name], $$row[griptape_price]";
			$griptape_price = $row[griptape_price];
			$griptape_id = $row[griptape_id];
                }
        ?>
</h2>

<h2> Hardware:                                                                                                                                                      <?php
		$query = "select hardware_id, hardware_brand, hardware_name, hardware_price from hardware where hardware_name = ";
		$query = $query."'".$hardwareName."'";                                                                                                                      $result = $mysqli->query($query);
		                while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
					print "$row[hardware_brand], $row[hardware_name], $$row[hardware_price]";
					$hardware_price = $row[hardware_price];
					$hardware_id = $row[hardware_id];
				}
	 ?>
</h2>

<h2> Accessory:
	<?php
		$query = "select accessory_id, accessory_brand, accessory_name, accessory_price from accessories where accessory_name = ";
		$query = $query."'".$accessoryName."'";
		$result = $mysqli->query($query);                                                                                                                                           while($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
					print "$row[accessory_brand], $row[accessory_name], $$row[accessory_price]";
					$accessory_price = $row[accessory_price];
					$accessory_id = $row[accessory_id];	
		} 
	?>  
</h2>

<h2> <center> Total:
	<?php
		$total_price = $deck_price + $wheel_price + $truck_price + $bearing_price + $griptape_price + $hardware_price + $accessory_price;
		print "$$total_price";
	?>

<hr> </hr>

<form action="orderComplete.php" method="POST">
	<p>
        <label for="firstName">First Name:</label>
        <input type="text" name="first_name" id="firstName" required="required">
    	</p>
    	<p>
        <label for="lastName">Last Name:</label>
        <input type="text" name="last_name" id="lastName" required="required">
    	</p>
    	<p>
        <label for="Address">Address:</label>
        <input type="text" name="cust_address" id="address" required="required">
	</p>
	<p>
	<label for="State">State:</label>
	<input type="text" name="cust_state" id="state" required="required">
	</p>
	<p>
	<label for="Zipcode">Zipcode:</label>
	<input type="number" name="cust_zip" id="zipcode" minlength="5" maxlength="5" required="required">
	</p>
	<input type="hidden" name="deck_id" id=deckID value=<?php echo "$deck_id"; ?>>
	<input type="hidden" name="truck_id" id=truckID value=<?php echo "$truck_id"; ?>>
	<input type="hidden" name="wheel_id" id=wheelID value=<?php echo "$wheel_id"; ?>>
	<input type="hidden" name="bearing_id" id=bearingID value=<?php echo "$bearing_id"; ?>>
	<input type="hidden" name="griptape_id" id=griptapeID value=<?php echo "$griptape_id"; ?>>
	<input type="hidden" name="hardware_id" id=hardwareID value=<?php echo "$hardware_id"; ?>>
	<input type="hidden" name="accessory_id" id=accessoryID value=<?php echo "$accessory_id"; ?>>
	<input type="hidden" name="total_price" id="totalPrice" value=<?php echo "$total_price"; ?>>
	<input type="hidden" name="current_date" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly">
    	<input type="submit" value="Submit">
</form>

</html>



