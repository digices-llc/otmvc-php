<?php

abstract class DBO
{

    protected $name;
    
    protected $user;

    protected $password;
    
    protected $pdo;
    
    public function __construct()
    {
    	
        $this->pdo = new PDO('mysql:host=localhost;dbname='.$this->name,$this->user,$this->password);
    
    }

    public function executeSQL($sql)
    {
        return $this->pdo->exec($sql);
    }

    public function fetchRows($sql)
	{
		if ($res = $this->pdo->query($sql, PDO::FETCH_ASSOC)) {
			$rows = array();
		    foreach ($res as $row) {
		        array_push($rows,$row);
		    }
			return $rows;
		} else {
		    return false;
		}
	}

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

}
