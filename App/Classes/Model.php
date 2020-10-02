<?php

//namespace App\Classes;



abstract class Model 
{
    protected $table;
   
    protected $connect;
    

public function __construct()
{   
    try
    {

        $this->connect = new PDO('mysql:host=localhost;dbname=solid_solution;charset=utf8', 'root', '');
        $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch (PDOException $e)
     {
        //TO DO: make error class
        die($e->getMessage()) ;
    };
    
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


public function update()
{
    
}

public function delete()
{
    
}





}