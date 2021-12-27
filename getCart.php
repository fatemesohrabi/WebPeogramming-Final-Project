<?php
session_start();
require_once "config.php";
require_once "model/product.php";
header("Access-Control-Allow-origin: *");
header ("Content-Type: application/json; charset=UTF-8");
$temp="";

if(isset($_SESSION['CART'])) 
{

    foreach($_SESSION['CART'] as $product)
    {
        $pr=unserialize($product);
        $temp.= '{"Pname":"'.$pr.'"},';
       
    }
    
}
$temp=substr($temp, 0, strlen ($temp) -1); 
$temp='{"records":['.$temp.']}';
echo ($temp);
?>  