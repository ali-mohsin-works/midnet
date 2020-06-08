<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <title>Grade Response API</title>
</head>
<body>
<div class="main">
<h2>Student Details</h2>
  
<form action="" method="POST">
	<label>Enter Temperature :</label><br />
		<input type="text" id="temperature" name="temperature" required/>
		<select name="temperature_unit" id="temperature_unit" >
		<option value="Kelvin">Kelvin</option>
		<option value="Celsius">Celsius</option>
		<option value="Fahrenheit">Fahrenheit</option>
		<option value="Rankine">Rankine</option>
		</select>
	<br /><br />
	<label>Target Units :</label><br />
		<select name="target_unit" id="target_unit" >
		<option value="Kelvin">Kelvin</option>
		<option value="Celsius">Celsius</option>
		<option value="Fahrenheit">Fahrenheit</option>
		<option value="Rankine">Rankine</option>
		</select>
	<br /><br />
	<label>Student Response :</label><br />
		<input type="text" name="student_responce" required/>
	<br /><br />
		<button class="button" type="submit" name="submit">Submit</button>
</form>    
<br/> <br/>
<?php
if (isset($_POST['submit'])) {
	$temperature = str_replace(' ', '', $_POST['temperature']); 
	$temperature_unit = str_replace(' ', '',  $_POST['temperature_unit']);
	$target_unit = str_replace(' ', '', $_POST['target_unit']) ;
	$student_responce = str_replace(' ', '', $_POST['student_responce']) ;

	$url = "http://localhost/midnet/api/".$temperature."/".$temperature_unit."/".$target_unit."/".$student_responce;
	 
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	$result = json_decode($response); 
	//print_r($response);
			
	echo "<table>";
	echo "<tr><td><b>Input Temperature:</b></td><td>$temperature $temperature_unit</td></tr>";
	echo "<tr><td><b>Target Units:</b></td><td>$target_unit</td></tr>";
	echo "<tr><td><b>Student Response:</b></td><td>$student_responce</td></tr>";
	echo "<tr><td><b>Grade:</b></td><td>$result->grade</td></tr>";
	echo "</table>";
}
    ?>
</div>
</body>
</html>