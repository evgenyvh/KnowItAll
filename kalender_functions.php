<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$TBname = "weetje";
$melding = null;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    function fact($d){
        global $conn;
        $sql = "SELECT * FROM weetje WHERE MONTH(datum) = ". $d['month'] ." AND DAY(datum) = ".$d['day'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $melding = '';
            while ($row = $result->fetch_assoc()) {
                $melding .= sprintf( "<div class='melding'>" . $row["weetje"] . " " . $row["datum"] . "<br></div>");
            }
        } else {
            $melding = sprintf( "<div class='melding'>0 results</div>");
        }
        $conn->close();
        return $melding;
    }