<?php
	require("connect.php");
	
	if(isset($_POST["name"])){
		
		$id = $_POST["id"];
		$name = $_POST["name"];
		$sex = $_POST["sex"];
		$age = $_POST["age"];
		$address = $_POST["address"];
		$party = $_POST["national_party"];
		$platform = $_POST["platform"];
		
		if($_POST["name"] == ''){
			echo "<script>alert('Please input name!');";
		}else{
		$sql = "UPDATE tbsenatorelect SET name = :name, sex = :sex, age = :age, address = :address, national_party = :national_party, platform = :platform WHERE id = :id";
		}
		try {
			$result = $conn->prepare($sql);
			$values = array(":name" => $name, ":sex" => $sex,":age" => $age,":address" => $address,":national_party" => $party,":platform" => $platform, ":id" => $id);
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
	<title> Edit Record </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align:center;">EDIT RECORD</h1>
<div class = "container">

<?php
	$sql = "SELECT * FROM tbsenatorelect WHERE id = :id";
	$id= ""; $name = ""; $sex = ""; $age = ""; $address = ""; $party = ""; $platform = "";
	try{
        $result = $conn->prepare($sql);
		$value = array(":id" => $_REQUEST["id"]);
		
        $result->execute($value);
		if ($result->rowCOunt()>0){
			$row=$result->fetch(PDO::FETCH_ASSOC);
			
			$id =  $row["id"];
			$name = $row["name"]; 
			$sex = $row["sex"];
			$age = $row["age"];
			$address = $row["address"]; 
			$party = $row["national_party"]; 
			$platform = $row["platform"];
		}
		
	}catch(PDOException $e){
			
		}
?>

	
	<form action = "edit_record.php" method = "post">
	
		<input type = "hidden" name = "id" value = "<?php echo $_REQUEST["id"]; ?>">
		
		<label> Name: </label>
		<input type = "text"  value = "<?php echo $name; ?>" class = "form-control" name = "name">
		
		<label>Sex:</label>
		<select class = "form-control" name = "sex">
			<option value ="" <?php if ($sex==''){ echo "selected='selected'"; }?>>Sex</option>
			<option value ="Male" <?php if ($sex=='Male'){ echo "selected='selected'"; }?> >Male</option>
			<option value ="Female" <?php if ($sex=='Female'){ echo "selected='selected'"; }?>>Female</option>
		</select>
			
		<label>Age:</label>
		<input type = "text" value = "<?php echo $age; ?>"  class = "form-control" name = "age">
		
		<label>Address:</label>
		<input type = "text" value = "<?php echo $address; ?>"  class = "form-control" name = "address">
		
		<label>National Party:</label>
		<input type = "text" value = "<?php echo $party; ?>"  class = "form-control" name = "national_party">
		
		<label>Platform:</label>
		<input type = "text" value = "<?php echo $platform; ?>" class = "form-control" name = "platform">
		

<br>
		
		<button type = "submit" class ="btn btn-primary">Save</button>
		
	</form>
</div>
</body>
</html>



