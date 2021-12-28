<?php

require_once "config.php";
require_once "model/product.php";
header("Access-Control-Allow-origin: *");
header ("Content-Type: application/json; charset=UTF-8");

$productList=product::GetAllproducts();
$temp = "";

for ($i=0; $i<count ($productList); $i++)
{
    $temp.= '{"ProdName":"'. $productList[$i]->getProdName().'",';
    $temp.= '"Info":"'. $productList[$i]->getInfo().'",';
    $temp.= '"TechInfo":"'. $productList[$i]->getTechInfo().'",';
    $temp.= '"Price":"'. $productList[$i]->getPrice().'",';
    $temp.= '"Count":"'. $productList[$i]->getCount().'",';
    $temp.= '"Pname":"'. $productList[$i]->getPname().'",';
    $temp.= '"Pic":"'. $productList[$i]->getPic().'"},';
}

$temp=substr($temp, 0, strlen ($temp) -1); 
$temp='{"records":['.$temp.']}';
echo ($temp);
?>  