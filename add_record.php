<?php

	if(isset($_POST["name"])){
		
		require("connect.php");
		
		$name = $_POST["name"];
		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$address = $_POST["address"];
		$party = $_POST["national_party"];
		$platform = $_POST["platform"];
		
		
		$sql = "INSERT INTO tbsenatorelect(name, sex, age, address, national_party, platform) VALUES(:name, :sex, :age, :address, :national_party, :platform)";
		
		try {
			$result = $conn->prepare($sql);
			$values = array(":name" => $name, ":sex" => $sex,":age" => $age,":address" => $address,":national_party" => $party, ":platform" =>$platform);
			$result->execute($values);
			
			if($result){
				echo "<script> alert('Record has been saved!'); window.location = 'list_senator.php'; </script>";
			}
			
		} catch(PDOException $e){
			die("Unexpected error has been occured!" . $e);
		}	
	}

?>
<html>
<head>
	<title> Add Record </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align:center;">ADD RECORD</h1>
<div class = "container">
	<form action = "" method = "post">
		<label> Name: </label>
		<input type = "text" class = "form-control" name = "name">
		
		<label>Sex:</label>
		<select class = "form-control" name = "sex">
			<option value ="">Sex</option>
			<option value ="Male">Male</option>
			<option value ="Female">Female</option>
		</select>
			
		<label>Age:</label>
		<input type = "text" class = "form-control" name = "age">
		
		<label>Address:</label>
		<input type = "text" class = "form-control" name = "address">
		
		<label>National Party:</label>
		<input type = "text" class = "form-control" name = "national_party">
		
		<label>Platform:</label>
		
		<input type = "text" class = "form-control" name = "platform">
		
		<button type = "submit" class ="btn btn-primary">Save</button>
		
	</form>
</div>
</body>
</html>