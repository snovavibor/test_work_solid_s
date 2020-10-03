<?php

/**
 * @param string $path or nothing
 * return path in \Public
 */
function asset($path = ""){
    $path = str_replace('/',DIRECTORY_SEPARATOR,$path);
   return __DIR__.'..\..\..\Public'.$path;
}


/**
 * custom vie dump(debug)
 */
function dd($param)
{
    if(is_array($param) || is_object($param)){
        echo '<pre>';
        var_dump($param);
        echo '</pre>';
    }else{
       echo($param); 
    }
    
    die();
}