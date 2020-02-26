<?php
class Element {
    public $wordid;
    public $lemma;
};
$word = $_GET['q'];

$servername = "localhost";
$username = "root";
$password = "mysunshine";
$db = "android_project";

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_error) {
    echo "Connection failed ";
}
$word = $mysqli->real_escape_string($word);
$sql = "SELECT * FROM words WHERE lemma LIKE '" . $word . "%' LIMIT 6";
$result = $mysqli->query($sql);

$RES = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($RES, $row);
    }
}

http_response_code(200);
header('Content-Type: text/json');
echo json_encode($RES);

$mysqli->close();
?>