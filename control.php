<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>SmartSolar</title>
	<link href="/images/logo.png" rel="icon" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" /><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script><script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><script src="https://code.highcharts.com/stock/highstock.js"></script><script src="https://code.highcharts.com/stock/modules/exporting.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.simpleWeather/3.1.0/jquery.simpleWeather.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/proj4js/2.3.6/proj4.js"></script><script src="https://code.highcharts.com/maps/highmaps.js"></script><script src="https://code.highcharts.com/maps/modules/exporting.js"></script><script src="https://code.highcharts.com/mapdata/countries/gb/gb-all.js"></script><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script><script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvw3KwjCFIxNTedkzYCPL-Ci-k142C2R0&callback=initMap">
                            </script>
	<style type="text/css">body {
                                font: 20px Montserrat, sans-serif;
                                line-height: 1.1;
                                color: #1F618D;
                            }
                        p {font-size: 16px; color: #34495E}
                        h3 { color: #34495E }
                        .margin {margin-bottom: 1px;}
                        .bg-1 {
                            background-color: #1abc9c; /* Green */
                            color: #ffffff;
                        }
                        .bg-2 {
                            background-color: #474e5d; /* light Blue */
                            color: #EBF5FB;
                        }
                        .bg-3 {
                            background-color: #e6e6e6; /* White */
                            color: #555555;
                        }
                        .bg-4 {
                            background-color: #2f2f2f; /* Black Gray */
                            color: #fff;
                        }
                        .container-fluid {
                            padding-top: 15px;
                            padding-bottom: 15px;
                        }
                        .navbar {
                            padding-top: 15px;
                            padding-bottom: 15px;
                            border: 0;
                            border-radius: 0;
                            margin-bottom: 0;
                            font-size: 12px;
                            letter-spacing: 5px;
                        }
                        .navbar-nav  li a:hover {
                            color: #1abc9c !important;
                        }
                        
                        .banner_holder{
                            width: 100%;
                            height: 300px;
                            min-height: 200px;
                            position: relative;
                        }
                        
                        .banner_holderImage{
                            height: 100%;
                            position:relative;
                            background:   url("https://s3-us-west-1.amazonaws.com/alittlepieceofmine.com/assets/images/header.jpg")no-repeat;
                            background-size: cover;
                            background-position: center;
                        }
                        
                        h2 {
                            position: absolute;
                            top: 0;
                            left: 0;
                            
                            width: 100%;
                            text-align: center;
                            
                        }
	</style>
</head>
<body><!-- Navbar -->
<nav class="navbar navbar-default">
<div class="container">
<div class="navbar-header"><button class="navbar-toggle" data-target="#myNavbar" data-toggle="collapse" type="button"></button><a class="navbar-brand" href="http://smartsolarsjsu.tech">Home</a></div>

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav navbar-right">
	<li><a href="http://smartsolarsjsu.tech/login/register/">Register</a></li>
	<li><a href="http://smartsolarsjsu.tech/login/wp-login.php">Login</a></li>
        <li><a href="about.html">About</a></li>
	<li><a href="weather.html">Weather</a></li>
	<li><a href="control.php">Control</a></li>
</ul>
</div>
</div>
</nav>

<div class="banner_holder">
<div class="banner_holderImage"></div>

<h2>SmartSolar</h2>
</div>
<!-- First Container --><!--<div class="container-fluid bg-1 text-center">
         <h3 class="margin">Who Am I?</h3>
         <img src="bird.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
         <h3>I'm an adventurer</h3>
         </div>--><!-- Second Container -->

<div class="container-fluid bg-2 text-center">
<h4 class="margin">Your Location</h4>



<?php $file_content = file_get_contents('/home2/manman/raspberry/coordinates.txt'); ?>
<script>

                google.charts.load('upcoming', { 'packages': ['map'] });
                google.charts.setOnLoadCallback(drawMap);

         
                function drawMap() {



var details = '<?php echo $file_content; ?>';
var coArray = details.split(",");

                     var data = google.visualization.arrayToDataTable([
                                                                      ['Lat', 'Long', 'Name'],
                                                                      [parseFloat(coArray[0].toString()), parseFloat(coArray[1].toString()), 'Oregon']
                                                                      ]);
                                                                      
                     var options = {
                         showTooltip: true,
                         showInfoWindow: true,
                         useMapTypeControl: true
                     };
                        /*var jsonData = $.ajax({
                            url: "insertsql.php",
                            dataType: "json",
                            async: false
                            }).responseText;
                                          
                        // Create our data table out of JSON data loaded from server.
                        var data = new google.visualization.DataTable(jsonData);
                        
                        var options = {
                            showTooltip: true,
                            showInfoWindow: true
                            mapTypeId: 'hybrid'
                        };*/

                    
                        var map = new google.visualization.Map(document.getElementById('chart_div'));
                        
                        
                        map.draw(data, options);
                };
            </script>


<div id="chart_div" style="height: 400px; min-width: 310px"></div>
</div>
<!-- Third Container (Grid) -->

<div class="container-fluid bg-3 text-center"><br />
<!-- TWO STEPS TO INSTALL FTP SERVER LOGIN:

  1.  Copy the coding into the HEAD of your HTML document
  2.  Add the last code into the BODY of your HTML document  --><!-- STEP ONE: Paste this code into the HEAD of your HTML document  --></div>
<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Reinout Verkerk -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://www.javascriptsource.com -->

<!-- Begin
function Login(form) {
var username = form.username.value;
var password = form.password.value;
var server = form.server.value;
if (username && password && server) {
var ftpsite = "ftp://" + username + ":" + password + "@" + server;
window.location = ftpsite;
}
else {
alert("Please enter your username, password, and FTP server's address.");
   }
}


function ftpRight(form, val) {

$.ajax({
        url: "save.php",
        type: "POST",
        data: { val: val, setid: true }, // add a flag
        success: function(data, textStatus, jqXHR){
            window.location = renderView;
        },
        error: function (jqXHR, textStatus, errorThrown){
            alert('Error!')
        }
    });


}

//  End -->
</script><!-- STEP TWO: Copy this code into the BODY of your HTML document  -->

<center>
<form name="login">
<table border="1" cellpadding="3" width="250">
	<tbody>
		<tr>
			<td>Username:</td>
			<td><input name="username" size="20" type="text" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input name="password" size="20" type="password" /></td>
		</tr>
		<tr>
			<td>Server:</td>
			<td><tt>ftp://</tt><input name="server" size="14" type="text" /></td>
		</tr>
		<tr>
			<td align="center" colspan="2"><input onclick="ftpRight(this.form, 'left')" type="button" value="←" /> <input onclick="ftpRight(this.form, 'right')" type="button" value="→" /> <input onclick="ftpRight(this.form, 'down')" type="button" value="↓" /> <input onclick="ftpRight(this.form, 'up')" type="button" value="↑" /></td>
		</tr>
	</tbody>
</table>
</form>
</center>
<!-- Script Size:  1.53 KB -->

<footer class="container-fluid bg-4 text-center"><p1>SmartSolar @ 2016</p1></footer>
</body>
<!-- Footer --></html>
