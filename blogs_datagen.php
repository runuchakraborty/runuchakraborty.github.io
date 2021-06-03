<?php 

/*
	PHP script to generate blog posts JSON data for VueJS application (runuchakraborty.github.io)
*/


$conn = new mysqli("localhost","root","");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected to database\n\n";

$sql = "SELECT * FROM runublog.blogposts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$blogposts = array();
  	while($row = $result->fetch_assoc()) {
    	$blogposts[] = $row;
  	}
} 

// print_r($blogposts);
file_put_contents("data.json",json_encode($blogposts,JSON_UNESCAPED_UNICODE));
echo "Data file created\n";

$conn->close();
