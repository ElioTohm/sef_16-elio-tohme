<?php
class MysqlWrapper
{
	private $dbConnection;

 	function connect ($ServerName, $UserName, $Password, $DBName)
    {     
        $this->dbConnection = new mysqli($ServerName,$UserName,$Password,$DBName);
        if ($this->dbConnection->connect_error) {
            die ("could not connect");
        }
    }

    function getFilm()
    {
        $query = "SELECT film_id,title,release_year, description FROM film";
        $result = $this->dbConnection->query($query);
        if (!$result) {
            die ($this->dbConnection->error);
        }
        return $result;
    }
	function getStore()
    {
        $query = "SELECT store_id FROM store";
        $result = $this->dbConnection->query($query);
        if (!$result) {
            die ($this->dbConnection->error);
        }
        return $result;
    }

    function getInventoryId($filmId, $storeId)
    {
        $query = "SELECT inventory_id FROM inventory WHERE film_id = '$filmId' AND store_id = '$storeId' LIMIT 1";
        $result = $this->dbConnection->query($query);
        return $result;
    }

    function getStaffId($storeId)
    {
        $query = "SELECT staff_id FROM staff WHERE store_id='$storeId' LIMIT 1";
        $result = $this->dbConnection->query($query);
        return $result;
    }

    function insertRental($rental_date, $inventoryId,$return_date, $staffId, $last_update)
    {
        $query = "INSERT INTO `rental`(`rental_id`, `rental_date`, `inventory_id`, `customer_id`, `return_date`, `staff_id`, `last_update`) VALUES ('','$rental_date','$inventoryId','30','$return_date','$staffId','$last_update')";
        $result = $this->dbConnection->query($query);
        if (!$result) {
            die ($this->dbConnection->error);
        } else {
            //Insert successfully
            return 1;
        }
    }

    function getLastInsertId()
    {
         $query="SELECT rental_id FROM rental WHERE rental_id = LAST_INSERT_ID()";
         $result = $this->dbConnection->query($query);
         return $result;
    }

    function getAmount($filmId)
    {
        $query="SELECT rental_duration,rental_rate FROM film WHERE film_id='$filmId' ";
        $result = $this->dbConnection->query($query);
        return $result;
    }

    function Payment($staffId, $rentalId, $payment, $payment_date, $last_update) 
    {        
        $query = "INSERT INTO `payment`(`payment_id`, `customer_id`, `staff_id`, `rental_id`, `amount`, `payment_date`, `last_update`) VALUES ('','30','$staffId','$rentalId','$payment','$payment_date','$last_update')";
        $result = $this->dbConnection->query($query);
        if (!$result) {
            die ($this->dbConnection->error);
        } else {
            //Insert successfully
            return 1;
        }
    }

    function disconnect()
    {
        $this->dbConnection->close();
    }

}
?>
