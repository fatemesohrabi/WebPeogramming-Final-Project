<?php
session_start();
require "config.php";
require "model/user.php";
require "model/product.php";
//$u;
include $ShareFolderPath."header.html";
$ProductsList = '';
$OldUserName="";

if(!isset($_SESSION['USER'])) {
    header('Location: Signin.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $u->GetUser();
    $Fname = $u->getFname();
    $Lname = $u->getLname();
    $UserName = $u->getUserName();
    $OldUserName=$UserName;
    $PassWord = $u->getPassWord();
    $Email = $u->getEmail();
    $Phone = $u->getPhone();
    $Address = $u->getAddress();

}
if(isset($_POST['change']))
{
    $u->setUsername($_POST['uiUserName']);
    $u->setPassword($_POST['uiPassWord']);
    $u->setFname($_POST['uiFname']);
    $u->setLname($_POST['uiLname']);
    $u->setEmail($_POST['uiEmail']);
    $u->setPhone($_POST['uiPhone']);
    $u->setAddress($_POST['uiAddress']);
    $u->UpdateUser($OldUserName);
    unset($_SESSION['USER']);
    $_SESSION['USER'] = serialize($u);
    header('Location: Profile.php');
}
if(isset($_POST['SignOut']))
{
    unset($_SESSION['CART']);
    header('Location: SignIn.php');
}
/*if(isset($_POST['submit']) && isset($_SESSION['CART']) )
{
    $deletedProduct=($_POST['btn']);
    echo($deletedProduct);
    $NewList= array();
    foreach($_SESSION['CART'] as $product)
    {
        //echo(unserialize($product));
        if($deletedProduct==unserialize($product))
        {
            //echo("here");
            //echo($deletedProduct);
            $deletedProduct="";
            continue;
        }
        array_push($NewList,$product);

    }
    unset($_SESSION['CART']);
    $_SESSION['CART']=$NewList;
    //header('Location: Profile.php');
    
}*/
if(isset($_SESSION['CART'])) 
{
    
    foreach($_SESSION['CART'] as $product)
    {
        //Print out the product ID.
        //echo($product.ProdName);
        //$p=$product->getProdName();
        $pr=unserialize($product);
        $ProductsList .= '<tr>';
        $ProductsList .= '<td>'.$pr.'</td>';
        $ProductsList .= '<td><input type="submit" name="submit" value="حذف"></td>';
        $ProductsList .= '<td style="display: none;"><input type="text" name="btn" value="';
        $ProductsList .= $pr.'"></td>';
        
    
        
        $ProductsList .= '</tr>';
        
        //header('Location: Profile.php');
    }  

}

include $ViewPath."Profile.html";
// include $ShareFolderPath."header.html";
// include $ShareFolderPath."menu.html";



 $ShareFolderPath."footer.html";



?>

