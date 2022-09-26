<?php

namespace chatapp\core;
use chatapp\core\DB;

class Query extends DB{
    
    /**
     * select
     *
     * @param  mixed $selectStatement
     * @return array
     */
    public  function select($selectStatement) : array
    {
        $CONN = $this->connect();
        $statement = $CONN->prepare($selectStatement);
        $statement->execute();
        $CONN = null;
       
        return $statement->fetchAll();
    }

    public  function insert($inserttStatement) : void
    {
        $CONN = $this->connect();
        $statement = $CONN->prepare($inserttStatement);
        $statement->execute();
        $CONN = null;
    }
}