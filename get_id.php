<?php
	$json_string = file_get_contents('php://input'); 
	#echo $json_string;
	$json = json_decode($json_string);
	$sid=$json->{'sid'};
    $con=mysqli_connect("totws.com","admin","admin","gmi");
     mysqli_set_charset($con, "utf8");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $query="select * from hbot where sid = $sid";
    $result = mysqli_query($con,$query);

    $TextOutput = "Sid = $sid\n";
    if($row = $result->fetch_assoc())
    {
          $TextOutput .= "Facebook :".$row['fb']."\n";
          $TextOutput .= "Register data: ".$row['dt'];
    }else{
        $TextOutput .= "ไม่พบข้อมูล";
    }

        header('Content-type: application/json');
		$response = new stdClass();
		$response = array(
			"messages" => array(
				array("text" => $TextOutput),
			)
		);
    echo json_encode($response);
?>
