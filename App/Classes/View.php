<?php


class View 
{

    protected $param;

    public function __construct($view,$param)
    {
        //TO DO: to check $param is empty
        
        $this->param = $param;
       
        require(__DIR__.'../../../Ressource/Views/default.php');

    }
}