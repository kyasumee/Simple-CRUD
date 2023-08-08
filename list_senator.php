<html>
<head>
	<title> CRUD APP </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
<h1 style="text-align:center;"> LIST OF THE NEWLY ELECTED SENATORS </h1> 
<?php

require("connect.php");

$sql = "SELECT * FROM tbsenatorelect";

    try{
        $result = $conn->prepare($sql);

        $result->execute();

?>
<div class = "container">
	
	<a class = "btn btn-outline-primary" href=" add_record.php" role="button"> Add Record</a>
		<table border ="1" class = "table table-hover table-striped">
			<tr>
				<th> #</th>
				<th>Name</th>
				<th>Sex</th>
				<th>Age</th>
				<th>Address</th>
				<th>National Party</th>
				<th>Platform</th>
				<th> Action </th>
				<th> </th>
			</tr>
    
<?php

        if($result->rowCount()>0){
            $i=1;
            while($row=$result->fetch (PDO::FETCH_ASSOC)){

?>                <tr>
                    <td> <?php echo $row["id"] ?> </td>
					<td> <?php echo $row["name"]; ?> </td>
					<td> <?php echo $row["sex"]; ?> </td>
					<td> <?php echo $row["age"]; ?> </td>
					<td> <?php echo $row["address"]; ?> </td>
					<td> <?php echo $row["national_party"]; ?> </td>
					<td> <?php echo $row["platform"]; ?> </td>
					<td>
						<a href = "edit_record.php?id=<?php echo $row["id"]?>" class = "btn btn-warning"> Edit Record</a>
					</td>
					<td>
						<a href = "delete.php" class = "btn btn-danger"> Delete Record</a>
					</td>
                </tr>
<?php
            }
			$i++;
        }
    }
	catch(PDOexception $e){
		
		die("An error has been occured".$e);
	}

?>
</div>
</body>
</html>