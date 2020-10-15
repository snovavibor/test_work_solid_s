<?php

//namespace App\Classes;



abstract class Model 
{
    protected $table;
   
    protected $connect;
    

public function __construct()
{   
    
    $this->connect = Db::connect();
    
}

public function all()
{

    $sql = "SELECT * FROM ".$this->table;
    $rows = $this->connect->query($sql)->fetchAll(PDO::FETCH_OBJ);
    return $rows;
}

public function where($id)
{
    $id = (int)$id;
    
        if(is_numeric($id)){
            
            $sql = "SELECT * FROM ".$this->table." WHERE `id` = :id";
             $result = $this->connect->prepare($sql);
             $result->bindParam(':id',$id,PDO::PARAM_INT);
             $result->execute();
            $rows = $result->fetchAll(PDO::FETCH_OBJ);
            return $rows;
    
        }else {
            
            return [];
        }
     
}

/**
 * @param array $param
 * @param array $value 
 */
public function create($param,$value)
{
    
    $sql = $this->makeStringforSql($param);
    
    $result = $this->connect->prepare($sql);
    
   
    $res = $result->execute($value);

    
    //TO DO:придумать что делать после успешной записи
    
}


public function makeStringforSql($fields)
{

    $sql = "INSERT INTO ".$this->table;

    $sql .= " (`".implode("`, `", array_keys($fields))."`)";
   
    $sql .= " VALUES (";

    for($i=0; $i<count($fields); $i++){

        $sql .='?';
        if($i != ( count($fields)-1) ){

            $sql .=',';
        }
        
    }
    $sql .= ");";
    
    
    return $sql;

}


public function update(&$id,&$strSql)
{

    $sql = "UPDATE {$this->table} SET {$strSql} WHERE id={$id}";
   
    $result = $this->connect->exec($sql);
    
    return $result ?? false;
   
    
}

public function delAll()
{
  
    $sql = "TRUNCATE TABLE ".$this->table;
    $result = $this->connect->exec($sql);
    return $this->all();
   
  
}

public function destroy($str)
{

    $sql = "DELETE FROM {$this->table} WHERE `id` IN ( {$str} )";
    
    $result = $this->connect->exec($sql);
    
    return $result ?? false;
    
}



}