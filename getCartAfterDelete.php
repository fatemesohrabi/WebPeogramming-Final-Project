<?php
session_start();
require_once "config.php";
require_once "model/product.php";
header("Access-Control-Allow-origin: *");
header ("Content-Type: application/json; charset=UTF-8");
$temp="";

if(isset($_SESSION['CART'])) 
{
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $todelete = $request->name;
    $NewList= array();
    if($todelete!="")
    {
        foreach($_SESSION['CART'] as $product)
        {
            $pr=unserialize($product);
            if($todelete==$pr)
            {
                $todelete="";
                continue;
            }
            $temp.= '{"Pname":"'.$pr.'"},';
            array_push($NewList,$product);
        }
        unset($_SESSION['CART']);
        $_SESSION['CART']=$NewList;
    }
   
    
}
$temp=substr($temp, 0, strlen ($temp) -1); 
$temp='{"records":['.$temp.']}';
echo ($temp);
?>  
