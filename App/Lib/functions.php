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


/**
 * make new array from send array 
 * @param array $array  array of values
 * @param string $key key of array for to make new array
 */
function makeArrayOfKey(&$array,$key)
{
   
    return array_column($array,$key);
    
}


/**
 * make string for sql query update with values(name field for update)
 * @param array $arr
 */
function makeStringForUpdate(&$arr)
{
    $tmp_arr =[];
    
     unset($arr["id"]);

     foreach($arr as $key => $value)
     {
        $tmp_arr[] = $key.'="'.$value.'"';
     }
    
    return implode(',',$tmp_arr);
}


