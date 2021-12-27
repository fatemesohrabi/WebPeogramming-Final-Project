
<?php
session_start();
require "config.php";
require "model/user.php";
require "model/product.php";
include $ShareFolderPath."header.html";
//include $ShareFolderPath."menu.html";


$ProdName = $_GET['Pname'];
$p=new product();
$p->setProdName($ProdName);
$p->GetProduct();
$Info=$p->getInfo();
$TechInfo=$p->getTechInfo();
$Price=$p->getPrice();
$Count=$p->getCount();
$Pname=$p->getPname();
$Pic=$p->getPic();
$uiMessage="";
$uiMessage2="";
if(isset($_POST['submit']))
{
    if(!isset($_SESSION['USER']))
    {
        echo("برای افزودن به سبد خرید وارد حساب کاربری خود شوید.");
    }
    else
    {
        if(!isset($_SESSION['CART']))
        {
            //If it doesn't, create an empty array.
            $_SESSION['CART'] = array();
        }
        $_SESSION['CART'][]=serialize($ProdName);
        echo("به سبد خریدتان اضافه شد.");
        //print_r($_SESSION['CART']);
    }
}
include $ViewPath."Product.html";

include $ShareFolderPath."footer.html";



?>
