<?php
session_start();
unset($_SESSION['USER']);
require "config.php";
require "model/user.php";

//include $ShareFolderPath."menu.html";

$Message = '';
if(isset($_POST['submit']))
{
    $u = new user();
    $u->setUsername($_POST['uiUserName']);
    $u->setPassword($_POST['uiPassWord']);
    if($u->checkUserPass())
    {
        
        $_SESSION['USER'] = serialize($u);
        header('Location: Profile.php');
    }

    $Message = 'نام کاربری یا رمزعبور اشتباه است!';
}

include $ShareFolderPath."header.html";
include $ViewPath."Signin.html";

include $ShareFolderPath."footer.html";

?>