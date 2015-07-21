<?php
/**
 * ApiRouter.class.php
 *
 * Route and retrieve data through web endpoints.
 *
 * @version 1.0
 * @author Eric Horodyski
 */

use Models\Response as Response;

class Router
{
    protected $endpoint = '';
    protected $method = '';
    protected $verb = '';
    protected $args = Array();

    public function __construct($request, $origin)
    {
        $this->args = explode('/', rtrim($request, '/'));
        $this->endpoint = array_shift($this->args);
        if (array_key_exists(0, $this->args) && !is_numeric($this->args[0])) 
        { 
            $this->verb = array_shift($this->args); 
        }
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function processRoute()
    {
        $class = 'Controllers\\'.$this->endpoint;
        if(class_exists($class))
        {
            $controller = new $class();
            $response =  $controller->{$this->method}();
            return $response->Send();
        }
        return New Response("No Endpoint: ".$this->endpoint, 404);
    }
}


