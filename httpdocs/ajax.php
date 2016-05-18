<?php         
//ini_set('display_errors', '1');
//error_reporting(-1);
include_once('../geolocate/geolocate.php');
require_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die;
}        

$hackers = array();
$results = $conn->query("SELECT ip, port, name FROM hackers ORDER BY id DESC LIMIT 500");

while($result = $results->fetch_object()) {
    $hackers[] = $result;
} 

$conn->close();

if(!empty($hackers)){
    $hacker = $hackers[array_rand($hackers)];
    $region = geolocateCity($hacker->ip);
    echo json_encode(array($hacker->ip, $hacker->port, $region->latitude, $region->longitude));   
}                     
                    
?>
