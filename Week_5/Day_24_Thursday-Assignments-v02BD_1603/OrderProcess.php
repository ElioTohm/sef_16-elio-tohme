<?php 
class OrderProcess
{
	private $CONN;

	function __construct ($ServerName, $UserName, $Password, $DBName)
	{
		// Create connection
		$this->CONN = mysqli_connect($ServerName, $UserName, $Password, $DBName);

		//check if connection 
		if (mysqli_connect_errno()) {
	        die( "Could not open connection to server" );
	    }

	    if($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo "lol";
		}
	}
	
	function __destruct ()
	{
		if(is_resource($this->CONN))
		{
		    mysql_close($this->CONN);
		}
		
	}

	function getAllMovies()
	{
		// mysqli_query($this->CONN, "select * from film;");
		$query = "SELECT title, release_year, description FROM film;";

		if ($result = $this->CONN->query($query)) {

			/* fetch object array */
			while ($row = $result->fetch_row()) {
				printf("<tr> <td><input type='checkbox' /></td> <td>%s</td> <td>%s</td> <td>%s</td> </tr>", $row[0], $row[1], $row[2]);
			}
		}
	}

	private function rent()
	{	
		
	}

}
?>
