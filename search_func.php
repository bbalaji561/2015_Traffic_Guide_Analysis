
 <?php
$output = "";

	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
        $u1 = preg_replace('#[^a-z0-9]#i', '', $_POST['u1']);

        
	if ($u == ""){
		// They tried to defeat our security
		echo $output;
		exit;		
	}
            
	include("db_conx.php");	
		$sql = "SELECT station_id FROM station 
	        WHERE station_name='$u' OR station_name='$u1'";
	$user_query = mysqli_query($db_conx, $sql);
	$numrows = mysqli_num_rows($user_query);
        
	if($numrows > 0){
		while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)){
			$uname = $row["station_id"];
			$sql1 = "SELECT * FROM details 
	        WHERE $uname='1'";
                        
	$user_query1 = mysqli_query($db_conx, $sql1);
	$numrows1 = mysqli_num_rows($user_query1);
        if($numrows1 > 0){
		while ($row2 = mysqli_fetch_array($user_query1, MYSQLI_ASSOC)){
			$uname2 = $row2["bus_id"];
			$sql2 = "SELECT bus_id FROM `12-12-12`
                            WHERE check1='1'";
                        
	   
	$user_query2 = mysqli_query($db_conx, $sql2);
	$numrows2 = mysqli_num_rows($user_query2);
                        
                    while ($row3 = mysqli_fetch_array($user_query2, MYSQLI_ASSOC)){
                        $uname3=$row3["bus_id"];
                        $sql3 = "SELECT station_no,max_time FROM `12` 
                            WHERE check1='1' ";
                         
                   
                            	$user_query3 = mysqli_query($db_conx, $sql3);
                                $numrows3 = mysqli_num_rows($user_query2);
                                $temp=0;
                                 while ($row4 = mysqli_fetch_array($user_query3, MYSQLI_ASSOC)){
                                     
                                    $uname4= $row4["max_time"];
                                     echo $uname4;
                                     echo "&nbsp;"; 
                                  //echo $row4["station_no"];
                                  $abc = "SELECT * FROM station WHERE station_id = $row4[station_no]";
                                  $user_query4 = mysqli_query($db_conx, $abc);
                                   while ($row4 = mysqli_fetch_array($user_query4, MYSQLI_ASSOC)){
                                       echo $row4["station_name"];
                                       echo "&nbsp;";       
                                       
                                     
                                   }
                                          echo "<br>";  
                                  
                                 // $temp=$row4["max_time"];
                    }
        }
        }}}}
		echo $output;
		exit;
                

?>

