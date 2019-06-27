<?php

// Set your timezone
date_default_timezone_set('Asia/Tokyo');
// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}
// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
// Today
$today = date('Y-m-j', time());
// For H3 title
$html_title = date('Y / m', $timestamp);
// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));
// Number of days in the month
$day_count = date('t', $timestamp);

    include "kalender_functions.php";








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>PHP Calendar</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="styles/datepickk.css">
    <script src="distdatepickk.js"></script>
</head>
<body>

<ul class="topnav">
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="kalender.php">Kalender</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="Inlog Register/login.php">Log in/uit</a></li>
</ul>
<script>
    var datepicker = new Datepickk();
</script>
<form method="post" action=" ">
<div class="container">
    <div class="row">
        <div class='col-lg-9'>
            <div class="form-group">
                <H2>Kies een datum</H2>
                <div class='col-sm-4 input-group date' id='dtpickerdemo'>
                    <input type='text' name="datum" class="form-control" id="seldate">
                    <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" onclick="closeOnSelectDemo()"></span>
                    </span>
                </div>
                    <input type="submit" name="fact" value="zoek weetje">
            </div>

        </div>
    </div>
</div>
</form>
<?php

if(isset($_POST["fact"])){
    $datum = $_POST["datum"];
    $d = date_parse_from_format("d-m-Y", $datum);
    echo fact($d);
}
?>
<script>
    function closeOnSelectDemo(){
        datepicker.unselectAll();
        datepicker.closeOnSelect = true;
        console.log(datepicker.closeOnSelect);
        datepicker.onSelect = function(checked){
            document.getElementById("seldate").value = this.toLocaleDateString();
        };
        datepicker.onClose = function(){
            datepicker.closeOnSelect = false;
            datepicker.onClose = null;
        }
        datepicker.show();
    }
</script>
<div class="footer">
    <h2>KnowItAll</h2>
    <h4>Copyright © 2019 KnowItAll Productions</h4>
</div>
</body>
</html>
