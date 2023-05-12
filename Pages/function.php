<?php

//function.php
$dbhost="localhost";
$dbname="id20740386_web";
$dbuser="id20740386_root";
$dbpass="Bilal313@lau";

$connect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);


function fetch_top_five_data($connect)
{
	$query = "
	SELECT * FROM fans 
	ORDER BY id DESC 
	LIMIT 5";

	$result = $connect->query($query);

	$output = '';

	foreach($result as $row)
	{
		$output .= '
		
		<tr>
			<td>'.$row["fname"].'</td>
			<td>'.$row["lname"].'</td>
			<td>'.$row["email"].'</td>
			<td>'.$row["gender"].'</td>
			<td><button type="button" onclick="fetch_data('.$row["id"].')" class="btn btn-warning btn-sm">Edit</button>&nbsp;<button type="button" class="btn btn-danger btn-sm" onclick="delete_data('.$row["id"].')">Delete</button></td>
		</tr>
		';
	}
	return $output;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM fans";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

?>