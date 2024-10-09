<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewuserBtn'])) {
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$passwords = trim($_POST['passwords']);
	$specialty = trim($_POST['specialty']);
	$phone = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$date_added = trim($_POST['date_added']);

	if (!empty($first_name) && !empty($last_name) && !empty($passwords) && !empty($specialty) && !empty($phone)  && !empty($email)  && !empty($date_added)) {
			$query = insertIntousers($pdo,$first_name, $last_name, 
			$passwords, $specialty, $phone, $email, $date_added);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editusertBtn'])) {
	$user_id = $_GET['user_id'];
	$first_name = trim($_POST['first_name']);
	$last_name = trim($_POST['last_name']);
	$passwords = trim($_POST['passwords']);
	$specialty = trim($_POST['specialty']);
	$phone = trim($_POST['phone']);
	$email = trim($_POST['email']);
	$date_added = trim($_POST['date_added']);

	if (!empty($user_id) && !empty($first_name) && !empty($last_name) && !empty($passwords) && !empty($specialty) && !empty($phone) && !empty($email) && !empty($date_added)) {

		$query = updateAuser($pdo, $user_id, $first_name, $last_name, $passwords, $specialty, $phone, $email, $date_added);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteUserBtn'])) {

	$query = deleteAuser($pdo, $_GET['user_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>




