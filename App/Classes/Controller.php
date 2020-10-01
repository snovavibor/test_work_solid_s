<?php


 abstract class Controller 
{
    
    public function view($string,$param=null){
        
        new View($string,$param);
    }
}