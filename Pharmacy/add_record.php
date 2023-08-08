<?php

	if(isset($_POST["name"])){
		
		require("connect.php");
		
		$id= $_POST["id"];
		$name = $_POST["name"];
		$qty = $_POST["qty"];
		$date_expiration = $_POST["date_expiration"];
		$amount = $_POST["amount"];
		
		
		
		$sql = "INSERT INTO tblmedicine(id, name, qty, date_expiration, amount) VALUES(:id, :name, :qty, :date_expiration, :amount)";
		
		try {
			$result = $conn->prepare($sql);
			$values = array(":name" => $name, ":qty" => $qty, ":date_expiration" => $date_expiration,":amount" => $amount);
			$result->execute($values);
			
			if($result){
				echo "<script> alert('Record has been saved!'); window.location = 'list_medicine.php'; </script>";
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
		
	
		<label> Name </label>
		<input type = "text" class = "form-control" name = "name">
		
		<label> Quantity </label>
		<input type = "text" class = "form-control" name = "qty">
			
		<label> Date of Expiration </label>
		<input type = "text" class = "form-control" name = "date_expiration">
		
		<label>Amount </label>
		 <input type = "text" class = "form-control" name = "amount">
		<br>
		
		<button type = "submit" class ="btn btn-primary">Save</button>
		
	</form>
</div>
</body>
</html>