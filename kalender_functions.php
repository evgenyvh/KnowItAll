<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";
$TBname = "weetje";
$meldingkalener = null;

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
            $meldingkalender = '';
            while ($row = $result->fetch_assoc()) {
                $meldingkalender .= sprintf( "<br><div class='meldingkalender'>" . $row["weetje"] . " " . $row["datum"] . "<br></div>");
            }
        } else {
            $meldingkalender = sprintf( "<div class='meldingkalender'>0 results</div>");
        }
        $conn->close();
        return $meldingkalender;
    }