<?php

namespace chatapp\core;

/**
 * Router
 */
class Router{
    
    /**
     * routes
     *
     * @var array
     */
    protected   $routes = [];
        
    /**
     * request
     *
     * @var mixed
     */
    public      $request;
        
    /**
     * response
     *
     * @var mixed
     */
    public      $response;
        
    /**
     * render
     *
     * @var mixed
     */
    public      $render;
    
    /**
     * __construct
     *
     * @param  mixed $request
     * @param  mixed $response
     * @param  mixed $render
     * @return void
     */
    public function __construct(Request $request, Response $response, Render $render)
    {
        $this->request      = $request;
        $this->response     = $response;
        $this->render       = $render;
    }
    
    /**
     * get
     *
     * @param  mixed $path
     * @param  mixed $callback
     * @return array
     */
    public function get($path, $callback) : array
    {
        return $this->routes['get'][$path] = $callback;
    }
    
    /**
     * post
     *
     * @param  mixed $path
     * @param  mixed $callback
     * @return array
     */
    public function post($path, $callback) : array
    {
        return $this->routes['post'][$path] = $callback;
    }
    
    /**
     * resolve
     *
     * @return string
     */
    public function resolve() : string
    {
        $path       = $this->request->getPath();
        $method     = $this->request->getMethod();
        $callback   = $this->routes[$method][$path] ?? null;

        if($callback === null){
            $this->response->setHttpCode(404);
            return $this->render->render('_404', 'Page not found 404');
        }

        if(is_string($callback)){
            return $this->render->render($callback);;
        }

        if(is_array($callback)){
            $callback[0] = new $callback[0];
        }
        return call_user_func($callback, $this->request);
    }
}