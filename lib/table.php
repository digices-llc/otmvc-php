<?php

abstract class Table
{

    protected $dbo;
    
    protected $tableName;
    
    public function fetchAllRows() {
        $sql = 'SELECT * FROM  `'.$this->tableName.'`;';
        if ($rows = $this->dbo->fetchRows($sql)) {
            return $rows;
        } else {
            return false;
        }
    }

    public function fetchRowFromId($id) {
        $sql = 'SELECT * FROM  `'.$this->tableName.'` WHERE `id` = '.$id.';';
        if ($rows = $this->dbo->fetchRows($sql)) {
            return $rows[0];
        } else {
            return false;
        }
    }
    
    public function insertArray($arr) {
        $sql = 'INSERT INTO  `'.$this->tableName.'` VALUES (NULL';
        foreach ($arr as $val) {
            $sql .= ",'".$val."'";
        }
        $this->dbo->executeSQL($sql);
        return $this->dbo->lastInsertId();
    }

}
