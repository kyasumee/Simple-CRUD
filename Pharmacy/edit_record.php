<?php
	require("connect.php");
	
	if (isset($_POST["name"])) {
		
		$id= $_POST["id"];
		$name = $_POST["name"];
		$qty = $_POST["qty"];
		$date_expiration = $_POST["date_expiration"];
		$amount = $_POST["amount"];
		
		if($_POST["name"] == ''){
			echo "<script>alert('Please input name!');";
		}else{
		$sql = "UPDATE tblmedicine SET  name= :name, qty = :qty, date_expiration = :date_expiration, amount= :amount WHERE id = :id)";
		}
		try {
			$result = $conn->prepare($sql);
			$values = array( ":name" => $name, ":qty" => $qty, ":date_expiration" => $date_expiration,":amount" => $amount);
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
	<title> Edit Record </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align:center;">EDIT RECORD</h1>
<div class = "container">

<?php
	$sql = "SELECT * FROM tblmedicine WHERE id = :id";
	$id= ""; $name = ""; $qty = ""; $date_expiration = ""; $amount = ""; 
	try{
        $result = $conn->prepare($sql);
		$value = array(":id" => $_REQUEST["id"]);
		
        $result->execute($value);
		if ($result->rowCOunt()>0){
			$row=$result->fetch(PDO::FETCH_ASSOC);
			
			$id =  $row["id"];
			$name = $row["name"]; 
			$qty = $row["qty"];
			$date_expiration = $row["date_expiration"];
			$amount = $row["amount"]; 
			
		}
		
	}catch(PDOException $e){
			
		}
?>

	
	<form action = "edit_record.php" method = "post">
	
		<input type = "hidden" name = "id" value = "<?php echo $_REQUEST["id"]; ?>">
		
		
		
		<label> Name </label>
		<input type = "text"  value = "<?php echo $name; ?>" class = "form-control" name = "name">
		
		<label> Quantity </label>
		<input type = "text" value = "<?php echo $qty; ?>" class = "form-control" name = "quantity">
			
		<label> Date of Expiration </label>
		<input type = "text" value = "<?php echo $date_expiration; ?>" class = "form-control" name = "expiration">
		
		<label>Amount </label>
		<input type = "text" value = "<?php echo $amount; ?>" class = "form-control" name = "amount">
		

<br>
		
		<button type = "submit" class ="btn btn-primary">Save</button>
		
	</form>
</div>
</body>
</html>



