<?php
$servername = "";
$username = "u330404416_linch";
$password = "gOy+j2T+w0I";
$dbname = "u330404416_linch";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$json    =  file_get_contents('php://input');
$obj     =  json_decode($json);

$sql = "SELECT * FROM wp_ali_contacts ORDER BY id DESC ";
$result = $conn->query($sql);


if(mysqli_num_rows($result))
{
    $output = array();
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo "Failed...!";
}
$conn->close();

?>