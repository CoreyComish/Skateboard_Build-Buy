<!-- Skateboard Build & Buy PHP Landing Page -->
<!-- By Corey Comish -->
<?php
include('connectionData.txt');

$mysqli = new mysqli($server, $user, $pass, $dbname, $port);
if ($mysqli->connect_errno) {
	echo "Failed to connect to MYSQL"; }

$deckSet = $mysqli->query("SELECT * FROM decks");
$truckSet = $mysqli->query("SELECT * FROM trucks");
$wheelSet = $mysqli->query("SELECT * FROM wheels");
$bearingSet = $mysqli->query("SELECT * FROM bearings");
$griptapeSet = $mysqli->query("SELECT * FROM griptape");
$hardwareSet = $mysqli->query("SELECT * FROM hardware");
$accessorySet = $mysqli->query("SELECT * FROM accessories");

?>

<html>
<head>
	<title> Skateboard Build & Buy </title>
</head>

<body bgcolor='grey'>

<h1> <center> Welcome to Skateboard Build & Buy </center> </h1>
<h3> <center> Use the drop down menus to build up a skateboard, then click 'Buy Now' to purchase! </center> </h3>

<hr> </hr>

<form action="checkout.php" method="POST">
<h2> Deck:
	<select required name="deck_select" title="Choose a Deck">
	<option value="" selected disabled hidden> Select a Deck </option>  
		<?php
			while($rows = $deckSet->fetch_assoc()) 
			{
				$deck_brand = $rows['deck_brand'];
				$deck_name = $rows['deck_name'];
				$deck_price = $rows['deck_price'];
				echo "<option value='$deck_name'>$deck_brand - $deck_name - $$deck_price</option>";
			}
		?>
	</select> </h2>
<h2> Trucks:
	<select required name="truck_select">
	<option value="" selected disabled hidden> Select a Pair of Trucks </option>
                <?php
                        while($rows = $truckSet->fetch_assoc())
                        {
                                $truck_brand = $rows['truck_brand'];
                                $truck_name = $rows['truck_name'];
                                $truck_price = $rows['truck_price'];
                                echo "<option value='$truck_name'>$truck_brand - $truck_name - $$truck_price</option>";
                        }
                ?>
        </select> </h2>
<h2> Wheels:
	<select required name="wheel_select">
	<option value="" selected disabled hidden> Select a Set of Wheels </option>
                <?php
                        while($rows = $wheelSet->fetch_assoc())
                        {
                                $wheel_brand = $rows['wheel_brand'];
                                $wheel_name = $rows['wheel_name'];
                                $wheel_price = $rows['wheel_price'];
                                echo "<option value='$wheel_name'>$wheel_brand - $wheel_name - $$wheel_price</option>";
                        }
                ?>
        </select> </h2>
<h2> Bearings:
	<select required name="bearing_select">
	<option value="" selected disabled hidden> Select a Set of Bearings </option>
                <?php
                        while($rows = $bearingSet->fetch_assoc())
                        {
                                $bearing_brand = $rows['bearing_brand'];
                                $bearing_name = $rows['bearing_name'];
                                $bearing_price = $rows['bearing_price'];
                                echo "<option value='$bearing_name'>$bearing_brand - $bearing_name - $$bearing_price</option>";
                        }
                ?>
        </select> </h2>
<h2> Griptape:
	<select required name="griptape_select">
	<option value="" selected disabled hidden> Select a Griptape </option>
                <?php
                        while($rows = $griptapeSet->fetch_assoc())
                        {
                                $griptape_brand = $rows['griptape_brand'];
                                $griptape_name = $rows['griptape_name'];
                                $griptape_price = $rows['griptape_price'];
                                echo "<option value='$griptape_name'>$griptape_brand - $griptape_name - $$griptape_price</option>";
                        }
                ?>
        </select> </h2>
<h2> Hardware:
	<select required name="hardware_select">
	<option value="" selected disabled hidden> Select a Set of Hardware </option>
                <?php
                        while($rows = $hardwareSet->fetch_assoc())
                        {
                                $hardware_brand = $rows['hardware_brand'];
                                $hardware_name = $rows['hardware_name'];
                                $hardware_price = $rows['hardware_price'];
                                echo "<option value='$hardware_name'>$hardware_brand - $hardware_name - $$hardware_price</option>";
                        }
                ?>
        </select> </h2>
<h2> Accessory:
	<select required name="accessory_select">
	<option value="" selected disabled hidden> Select an Accessory </option>
                <?php
                        while($rows = $accessorySet->fetch_assoc())
                        {
                                $accessory_brand = $rows['accessory_brand'];
                                $accessory_name = $rows['accessory_name'];
                                $accessory_price = $rows['accessory_price'];
                                echo "<option value='$accessory_name'>$accessory_brand - $accessory_name - $$accessory_price</option>";
                        }
                ?>
        </select> </h2>

<input type="submit" value="Buy Now">
</form>

</body>
</html>
