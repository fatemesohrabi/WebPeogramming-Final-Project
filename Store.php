<?php
session_start();
require "config.php";
require "model/user.php";
require "model/product.php";
include $ShareFolderPath."header.html";


if(isset($_POST['submit']))
{
    $ProdName=$_POST['uiProdName'];
    header('Location: Signin.php');
}

include $ViewPath."Store.html";
include $ShareFolderPath."footer.html";
?>

