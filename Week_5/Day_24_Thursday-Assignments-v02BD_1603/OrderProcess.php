<?php 
require_once "MySqlWrapper.php";
require_once "Config.php";
class OrderProcess
{
	function __construct ()
	{
	    if($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo $_POST["Name"] . "<br>";
			echo $_POST["Title"] . "<br>";
			echo $_POST["Duration"] . "<br>";
		}
	}
	

	function getAllMovies(MySqlWrapper $wrapper)
	{
		$result = $wrapper->getFilm();
		while ($row = $result->fetch_row()) {
			printf("<tr> <td>%s</td> <td>%s</td> <td>%s</td> </tr>", $row[1], $row[2], $row[3]);
		}
	}

	function getAllMoviesSelect(MySqlWrapper $wrapper)
	{
		$result = $wrapper->getFilm();
		while ($row = $result->fetch_row()) {
			printf("<option value=\"%s\">%s</option>", $row[0], $row[1]);
		}
	}
}
?>
