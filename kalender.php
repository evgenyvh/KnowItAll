
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>PHP Calendar</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="script.js"></script>
</head>
<body onload="startTime()">

<ul class="topnav">
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="#calender">Kalender</a></li>
    <li><a href="#contact">Contact</a></li>
</ul>
<div class="container">
    <div class="card">
        <div class="front">
            <div class="contentfront">
                <div class="month">
                    <table>
                        <tr class="orangeTr">
                            <th>M</th>
                            <th>T</th>
                            <th>W</th>
                            <th>T</th>
                            <th>F</th>
                            <th>S</th>
                            <th>S</th>
                        </tr>
                        <tr class="whiteTr">
                            <th></th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                        </tr>
                        <tr class="whiteTr">
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                        </tr>
                        <tr class="whiteTr">
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
                        </tr>
                        <tr class="whiteTr">
                            <th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                        </tr>
                        <tr class="whiteTr">
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>
                </div>
                <div class="date">
                    <div class="datecont">
                        <div id="date"></div>
                        <div id="day"></div>
                        <div id="month"></div>
                        <i class="fa fa-pencil edit" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <h2>KnowItAll</h2>
    <h4>Copyright © 2019 KnowItAll Productions</h4>
</div>
</body>
</html>
