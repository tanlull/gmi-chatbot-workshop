<html><head>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

</head><body>
<?php
$con=mysqli_connect("localhost","root","password","gmi");
 mysqli_set_charset($con, "utf8");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM hbot");

echo '<table id="example" class="display compact" style="width:100%">';

$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<thead><tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr></thead><tbody>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</tbody></table>";

mysqli_close($con);
?>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body></html>

