<!DOCTYPE html>
<meta charset="UTF-8">
<?php 
	require_once "DataBase.php"; 
	require_once "Config.php"; 
?>

<html lang="en">
<head>
	<title>Exercise_1</title>
	<body>
		<h1>List of items</h1>
		<?php 
			$DB = new DataBase($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);
		?>
	</body>
</head>