<?php

//action.php

include('function.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add' || $_POST["action"] == 'Update')
	{
		$output = array();
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$customer_email = $_POST["customer_email"];

		$customer_gender = $_POST["customer_gender"];

		if(empty($first_name))
		{
			$output['first_name_error'] = 'First Name is Required';
		}

		if(empty($last_name))
		{
			$output['last_name_error'] = 'Last Name is Required';
		}

		if(empty($customer_email))
		{
			$output['customer_email_error'] = 'Email is Required';
		}
		else
		{
			if(!filter_var($customer_email, FILTER_VALIDATE_EMAIL))
			{
				$output['customer_email_error'] = 'Invalid Email Format';
			}
		}
		if(count($output) > 0)
		{
			echo json_encode($output);
		}
		else
		{
			$data = array(
				':customer_first_name'		=>	$first_name,
				':customer_last_name'		=>	$last_name,
				':customer_email'			=>	$customer_email,
				':customer_gender'			=>	$customer_gender
			);
			
			if($_POST['action'] == 'Add')
			{
				$query = "
				INSERT INTO fans 
				(fname, lname, email, gender) 
				VALUES (:customer_first_name, :customer_last_name, :customer_email, :customer_gender)
				";

				$statement = $connect->prepare($query);

				if($statement->execute($data))
				{
					$output['success'] = '<div class="alert alert-success">New Data Added</div>';

					echo json_encode($output);
				}
			}

			if($_POST['action'] == 'Update')
			{
				$query = "
				UPDATE fans 
				SET fname = :customer_first_name, 
				lname = :customer_last_name, 
				email = :customer_email, 
				gender = :customer_gender 
				WHERE id = '".$_POST["customer_id"]."'
				";

				$statement = $connect->prepare($query);

				if($statement->execute($data))
				{
					$output['success'] = '<div class="alert alert-success">Data Updated</div>';
				}

				echo json_encode($output);
			}
		}
	}

	if($_POST['action'] == 'fetch')
	{
		$query = "
		SELECT * FROM fans 
		WHERE id = '".$_POST["id"]."'
		";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{

			$data['first_name'] = $row['fname'];

			$data['last_name'] = $row['lname'];

			$data['customer_email'] = $row['email'];

			$data['customer_gender'] = $row['gender'];

		}

		echo json_encode($data);
	}

	if($_POST['action'] == 'delete')
	{
		$query = "
		DELETE FROM fans 
		WHERE id = '".$_POST["id"]."'
		";

		if($connect->query($query))
		{
			$output['success'] = '<div class="alert alert-success">Data Deleted</div>';

			echo json_encode($output);
		}
	}
}

?>