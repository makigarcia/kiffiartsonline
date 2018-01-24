<?php


$mysqli = new MySQLi('localhost','root','','myrnas');
/* Connect to database and set charset to UTF-8 */
if($mysqli->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
  exit;
} else {
  $mysqli->set_charset('utf8');
}
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
$data = array();

if ($data1 = $mysqli->query("SELECT * FROM customer WHERE fname LIKE '%$term%' OR lname LIKE '%$term%' OR customer_ID LIKE '%$term%' ")) {
	while($row = mysqli_fetch_array($data1)) {
$label = $row['fname']." ".$row['lname'];
$id = htmlentities(stripslashes($row['customer_ID'])); 
$data[] = array('label' => $label, 'value' => $label, 'id' => $id);
	}
}
// jQuery wants JSON data
echo json_encode($data);
flush();
 
$mysqli->close();
?>