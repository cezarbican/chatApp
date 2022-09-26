<?php

namespace chatapp\core;


/**
 * Response
 */
class Response{
    
    /**
     * setHttpCode
     *
     * @param  mixed $code
     * @return int
     */
    public function setHttpCode($code) : int 
    {
        return http_response_code($code);
    }
}