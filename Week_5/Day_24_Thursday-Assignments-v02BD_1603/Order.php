<!DOCTYPE html>
<meta charset="UTF-8">
<?php 
	require_once "OrderProcess.php"; 
	require_once "Config.php"; 
?>

<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css">
	<title>Exercise_1</title>
	<body>
		<h1>List of items</h1>
		<form action="action_page.php">
			<fieldset>
				<legend>Rent:</legend>
				<label for="Name"> Name: </label>
				<br>
				<input id="Name" type="text" name="Name" placeholder="your first name and last name" required/>
				<br>
				<label for="title"> Title: </label>
				<br>
				<input id="title" type="text" name="Title" placeholder="title" required/>
				<br>
				<label for="Duration"> for: </label>
				<br>
				<input id="Duration"  name="Duration" type="date"  
					data-date-inline-picker="true" placeholder="2016-11-23"
					required/>
				<br><br>
				<input type="submit" value="Submit">
			</fieldset>
		</form>
		<table>
		<tr>
			<th></th>
			<th>Title</th>
			<th>Year</th>
			<th>Description</th>
		</tr>
			<?php 
				$OrderProcess = new OrderProcess($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
				$OrderProcess->getAllMovies();
			?>
		</table>
		
	</body>
</head>