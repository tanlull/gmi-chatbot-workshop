 <?php
 #get the data from JSON POST
$json_string = file_get_contents('php://input'); 
#echo $json_string;
$json = json_decode($json_string);
$sid=$json->{'sid'};
$name=$json->{'name'};
$fb=$json->{'fb'};
#echo $sid.$name.$fb;

$con=mysqli_connect("totws.com","admin","admin","gmi");
 mysqli_set_charset($con, "utf8");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query="insert into hbot (sid,name,fb,dt) values('$sid','$name','$fb',NOW())";
$result = mysqli_query($con,$query);

    header('Content-type: application/json');
    $response = new stdClass();
	$response = array(
    "messages" => array(
        array("text" => "ดำเนินการเรียบร้อย\nกรุณาตรวจสอบรายชื่อได้ที่"),
        array("text" => "http://totws.com/gmi/show.php")
    )
);
    echo json_encode($response);
?>
