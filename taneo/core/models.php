<?php 

require_once 'dbConfig.php';

function insertIntousers($pdo,$first_name, $last_name, $passwords, $specialty, $phone, $email, $date_added) {

	$sql = "INSERT INTO users (first_name,last_name,passwords,specialty,phone,email,date_added) VALUES (?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $passwords, $specialty, 
		$phone, $email, $date_added]);

	if ($executeQuery) {
		return true;	
	}
}   

function seeAllusers($pdo) {
	$sql = "SELECT * FROM users";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getusersById($pdo, $user_id) {
	$sql = "SELECT * FROM users WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$user_id])) {
		return $stmt->fetch();
	}
}

function updateAuser($pdo, $user_id, $first_name, $last_name, 
	$passwords, $specialty, $phone, $email, $date_added) {

	$sql = "UPDATE user_id 
				SET first_name = ?, 
					last_name = ?, 
					passwords = ?, 
					specialty = ?, 
					phone = ?, 
					email = ?, 
					date_added = ? 
			WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $passwords, 
		$specialty, $phone, $email, $date_added, $user_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteAuser($pdo, $user_id) {

	$sql = "DELETE FROM users WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$user_id]);

	if ($executeQuery) {
		return true;
	}

}




?>