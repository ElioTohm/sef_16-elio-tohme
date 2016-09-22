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

    private $table = NULL;


    /**
  	 * on create trigger the construct of parent class
     */
    public function __construct ()
    {
    	parent::__construct();
    }

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
		$reqtype = $this->_getRequestType();
		$req = $this->_getRequest();
		$this->response($this->jsonfy($queryWrapper->$reqtype($args, $req)),200);
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