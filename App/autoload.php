<?php


spl_autoload_register(function ($class) {
   
    $class = str_replace('\\',DIRECTORY_SEPARATOR,$class);
   
    $path = __DIR__.'../../App/Classes/'.$class.'.php';

    if(file_exists($path)){
        require $path;
    }
  
    
});