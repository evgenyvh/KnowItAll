
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>PHP Calendar</title>
    <link href="styles/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="script.js"></script>
</head>
<body onload="startTime()">

<ul class="topnav">
    <li><a class="active" href="index.php">Home</a></li>
    <li><a href="kalender.php">Kalender</a></li>
    <li><a href="contact.html">Contact</a></li>
    <li><a href="Inlog Register/login.php">Log in/uit</a></li>
    <li><a href="admin.php">Admin</a></li>
</ul>
<script>
    var datepicker = new Datepickk();
</script>
<div class="container">
    <div class="row">
        <div class='col-lg-9'>
            <div class="form-group">
                <label for="dtpickerdemo" class="col-sm-2 control-label">Select date</label>
                <div class='col-sm-4 input-group date' id='dtpickerdemo'>
                    <input type='text' class="form-control" id="seldate"/ >
                    <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" onclick="closeOnSelectDemo()"></span>
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>
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
