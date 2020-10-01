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

public function create()
{
    
}

public function update()
{
    
}

public function delete()
{
    
}





}