<html>
<head><title>input</title>
<body>
<form action="user.php" method = "post" >
Source:
<select name = "u" id = "u" >
<?php
require_once('connections.php');
$sql = "SELECT * FROM `station`";
$query = mysql_query($sql,$connect) or die(mysql_error());
while($row = mysql_fetch_assoc($query))
{
	echo "<option value='$row[station_name]'> $row[station_name] </option>";
}
?>
</select>
<br>
Destination:
<select name = "u1" id = "u1" >
<?php
require_once('connections.php');
$sql = "SELECT * FROM `station`";
$query = mysql_query($sql,$connect) or die(mysql_error());
while($row = mysql_fetch_assoc($query))
{
	echo "<option value='$row[station_name]'> $row[station_name] </option>";
}
?>
</select>
<br>
<input type="submit" value = "check" />
</form>
</body>
</html>