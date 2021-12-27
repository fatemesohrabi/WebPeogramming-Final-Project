<?php
session_start();
require "config.php";
require "model/user.php";
require "model/product.php";

include $ShareFolderPath."header.html";
//include $ShareFolderPath."menu.html";


if(isset($_POST['submit']))
{
    //echo($_POST['submit']);
    $ProdName=$_POST['uiProdName'];
    header('Location: Signin.php');    //echo($ProdName);
 
    //die("ggggggggggggggggg");
    
}

include $ViewPath."Store.html";

include $ShareFolderPath."footer.html";



?>

