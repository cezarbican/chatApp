<?php

namespace chatapp\core;

use PDO;

/**
 * DB
 */
class DB{
        
    /**
     * host
     *
     * @var string
     */
    private  $host = "localhost"; 

    /**
     * user
     *
     * @var string
     */
    private  $user = "root";
        
    /**
     * password
     *
     * @var string
     */
    private  $password = "";
        
    /**
     * dbName
     *
     * @var string
     */
    private  $dbName = "chatapp";
    
      
       
    /**
     * connect
     *
     * @return PDO
     */
    protected function connect() : PDO
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbName";
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}