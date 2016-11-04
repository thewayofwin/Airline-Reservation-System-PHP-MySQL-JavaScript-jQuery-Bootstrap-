<?php
include_once 'dbconnect.php';

$sql = "SELECT * FROM airport";
if(! ($result = mysqli_query($conn, $sql)))
{
	
	echo "Errormessage: ".mysqli_error($conn)."\n";
}
else
{
	echo "<table>
		<tr><th>code</th>
		<th>name</th>
		</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr><td>".$row['code']."</td><td>".$row['name']."</td></tr>";
	}
	echo "</table>";
}

mysqli_close($conn);


?>