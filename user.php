<html>
<head><title>process</title></head>
<body>
<?php
require_once('connections.php');
if(isset($_POST['u']))
{
	$source = mysql_escape_string($_POST['u']);
	$dest = mysql_escape_string($_POST['u1']);
	$sql = "SELECT * FROM `station` where `station_name` = '$source'";
	//echo $sql;
	echo "<br>";
	$query = mysql_query($sql,$connect) or die(mysql_error());
	$result = mysql_fetch_assoc($query);
	$v1 = mysql_escape_string($result['station_id']);
	$sql = "SELECT * FROM `station` where station_name='$dest'";
	$query = mysql_query($sql,$connect) or die(mysql_error());
	$result = mysql_fetch_assoc($query);
	$v2 = mysql_escape_string($result['station_id']);
	$sql = "SELECT * FROM `paths` where `$v1`=1 and `$v2`=1";
	$query = mysql_query($sql,$connect) or die(mysql_error());
	$n = mysql_num_rows($query);
	if($n == 0)
		echo "path not found";
	else
	{
		echo "path found.. processing..";
		echo "<br>";
		while ($row = mysql_fetch_assoc($query))
		{
			echo $row['id'];
			echo "<br>";
		}
		echo "Less Traffic in :";
		$sql = "SELECT * from `details` where `$v1`=1 and `$v2`=1";
		$query = mysql_query($sql,$connect) or die(mysql_error());
		$traffic = array();
		$bus = 1; //to be deleted
		while($row = mysql_fetch_assoc($query));
		{
			$bus = $row['bus_id'];
			$sql1 = "SELECT * FROM `12-12-12` WHERE `check1`=1 and `bus_id` = '$bus'";
			//echo $sql1;
			$query1 = mysql_query($sql1,$connect) or die(mysql_error());
			while($col = mysql_fetch_assoc($query1))
			{
				$sql2 = "SELECT * FROM `$col[bus_id]`";
				//echo $sql2;
				$query2 = mysql_query($sql2,$connect) or die(mysql_error());
				$data = array();
				while($temp = mysql_fetch_assoc($query2))
				{
					if($temp['check1'] != 0)
						array_push($data,$temp['station']);
				}
				$sum = 0;
				foreach($data as $key => $user)
				{
					$sql5 = "SELECT * FROM `12-12-12` where bus_id = `$col[bus_id]`";
					//echo $sql5;
					$query5 = mysql_query($sql5,$connect) or die(mysql_error());
					$res = mysql_fetch_assoc($query5);
					$sum = $sum + $res['$user'];
				}
				array_push($traffic,$sum);
			}

		}
		//array.push($traffic,"100");
		//$min = min($traffic);
		$bus = 1; //to be deleted
		echo $bus;
	}


}
else
{
	echo "not set";
}


?>
</body>
</html>