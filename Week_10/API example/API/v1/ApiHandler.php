<?php
     
require_once 'Rest.php' ;
require_once 'config.php';
require_once 'QueryWrapper.php';
require_once 'Film.php';
require_once 'Actor.php';
require_once 'Customer.php';
require_once 'Address.php';
     
class ApiHandler extends Rest {
     
    public $data = "";

    private $_request = NULL;
    private $table = NULL;
    /**
     * Public method for access api.
     * This method dynmically call the method based on the query string
     */
	public function processApi ()
	{
		$args = explode('/', rtrim($_REQUEST['rquest'], '/'));
		$this->checkHeaderInfo($args);
		$queryWrapper = new QueryWrapper();
		$table  = new $args[0]();
		$this->CheckRequest();
		$tempreq = $this->_request;
		$this->response($this->jsonfy($queryWrapper->$tempreq($args),200));
	}


	private function CheckRequest ()
	{
		switch ($_SERVER['REQUEST_METHOD']) {
		 	case 'GET':
		 		$this->_request = 'Read';
		 		break;
		 	case 'POST':
		 		$this->_request = 'Post';
		 		break;
		 	case 'DELETE':
		 		$this->_request = 'Delete';
		 		break;
		 	case 'UPDATE':
		 		$this->_request = 'Update';
		 		break;
		 	default:
		 		# code...
		 		break;
		 } 
	}
	/**
	 * checkHeaderInfo() Checks if the parameters sent are correct 
  	 */
	private function checkHeaderInfo ( $rquestParam )
	{
		foreach ($rquestParam as $key => $value) {
			if (!class_exists($value)) {
				$this->response('Error code 400, Bad request',400);
			}
		}
	}
	     
    /**
     *  Encode array into JSON
     */
	private function jsonfy ($data)
	{
	    if(is_array($data)){
	        return json_encode($data, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
		}
	}

}
 
    
?>