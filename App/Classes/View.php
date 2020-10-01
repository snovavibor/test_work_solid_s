<?php


class View 
{

    public function __construct($view)
    {
        
        //require(__DIR__.'../../../Ressource/Views/'.$view.'.php');
        require(__DIR__.'../../../Ressource/Views/default.php');

    }
}