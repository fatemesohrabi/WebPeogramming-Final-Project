<?php
session_start();
require "config.php";
require "model/user.php";
$Message = '';
if(isset($_POST['submit']))
{
    echo($_POST['uiUserName']);
    $u = new user();
    $u->setUsername($_POST['uiUserName']);
    $u->setPassword($_POST['uiPassWord']);
    $u->setFname($_POST['uiFname']);
    $u->setLname($_POST['uiLname']);
    $u->setEmail($_POST['uiEmail']);
    $u->setPhone($_POST['uiPhone']);
    $u->setAddress($_POST['uiAddress']);

    if($u->IsUsernameExist())
    {
        $Message="این نام کاربری قبلا انتخاب شده است";
    }
    else
    {
        $u->save();
        header('Location: Signin.php');
    }

}
include $ShareFolderPath."header.html";
include $ViewPath."Signup.html";

include $ShareFolderPath."footer.html";
?>