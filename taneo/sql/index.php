<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Times New Roman";
		}
		input {
			font-size: 2 em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid navy;
		}
	</style>
</head>
<body>
	<h3>Welcome to the Job Management System. Input your details here to register</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="first_name">First Name</label> <input type="text" name="first_name"></p>
		<p><label for="last_name">Last Name</label> <input type="text" name="last_name"></p>
		<p><label for="passwords">Passwords</label> <input type="text" name="passwords"></p>
		<p><label for="specialty">Specialty</label> <input type="text" name="specialty"></p>
		<p><label for="phone">Phone</label> <input type="text" name="phone"></p>
		<p><label for="email">Email</label> <input type="text" name="email"></p>
		<p><label for="date_added">Date Added</label> <input type="text" name="date_added">
			<input type="submit" name="insertNewuserBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>User ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Passwords</th>
	    <th>Specialty</th>
	    <th>Phone</th>
	    <th>Email</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllusers = seeAllusers($pdo); ?>
	  <?php foreach ($seeAllusers as $row) { ?>
	  <tr>
	  	<td><?php echo $row['user_id']; ?></td>
	  	<td><?php echo $row['first_name']; ?></td>
	  	<td><?php echo $row['last_name']; ?></td>
	  	<td><?php echo $row['passwords']; ?></td>
	  	<td><?php echo $row['specialty']; ?></td>
	  	<td><?php echo $row['phone']; ?></td>
	  	<td><?php echo $row['email']; ?></td>
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="edituser.php?user_id=<?php echo $row['user_id'];?>">Edit</a>
	  		<a href="deleteuser.php?user_id=<?php echo $row['user_id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>