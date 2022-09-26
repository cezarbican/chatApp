<?php

namespace chatapp\core;

use chatapp\core\Request;
use chatapp\core\Response;
use chatapp\core\Render;
use chatapp\core\Router;
use chatapp\core\Query;

/**
 * ChatApp
 */
class ChatApp{
    
    /**
     * request
     *
     * @var mixed
     */
    public $request;    

    /**
     * response
     *
     * @var mixed
     */
    public $response;    

    /**
     * render
     *
     * @var mixed
     */
    public $render;    
    
    /**
     * router
     *
     * @var mixed
     */
    public $router;

    public $query;

    public static $app;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        self::$app          = $this;
        $this->request      = new Request();
        $this->response     = new Response();
        $this->render       = new Render();
        $this->query        = new Query();

        $this->router = new Router($this->request, $this->response, $this->render);
    }

    
    /**
     * run
     *
     * @return void
     */
    public function run() : void
    {
        echo $this->router->resolve();
    }
}