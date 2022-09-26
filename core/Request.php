<?php

namespace chatapp\core;


/**
 * Request
 */
class Request{

    
    /**
     * getPath
     *
     * @return string
     */
    public function getPath() : string
    {
        $url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
        $uri = filter_var($url, FILTER_SANITIZE_SPECIAL_CHARS);

        $position = strpos($url, "?");

        $position ? $uri = substr($uri, 0, $position) : $uri;

        return $uri;
    }
    
    /**
     * getMethod
     *
     * @return string
     */
    public function getMethod() : string 
    {
        return strtolower(trim($_SERVER['REQUEST_METHOD']));
    }
    
    /**
     * getBody
     *
     * @return array
     */
    public function getBody() : array
    {
        $body = [];

        if($this->getMethod() === 'get'){
            foreach($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        
        if($this->getMethod() === 'post'){
            foreach($_POST as $key => $value){
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        return $body;
    }
}