<?php


 abstract class Controller 
{
    
    public function view($string){
        
        new View($string);
    }
}