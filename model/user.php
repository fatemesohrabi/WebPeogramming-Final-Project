<?php
require_once "database.php";
abstract class person
{
    public $Fname;
    public $Lname;
    public $Email;
    public $Phone;
    public $Address;


    function getFname()
    {
        return $this->Fname;
    }

    function setFname($Fname)
    {
        $this->Fname = $Fname;
    }

    function getLname()
    {
        return $this->Lname;
    }

    function setLname($Lname)
    {
        $this->Lname = $Lname;
    }

    function getEmail()
    {
        return $this->Email;
    }

    function setEmail($Email)
    {
        $this->Email = $Email;
    }

    function getPhone()
    {
        return $this->Phone;
    }

    function setPhone($Phone)
    {
        $this->Phone = $Phone;
    }
    function getAddress()
    {
        return $this->Address;
    }

    function setAddress($Address)
    {
        $this->Address = $Address;
    }



}

class user extends person
{
    public $UserName;
    public $PassWord;

    public function getUserName()
    {
        return $this->UserName;
    }

    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }

    public function getPassWord()
    {
        return $this->PassWord;
    }

    public function setPassWord($PassWord)
    {
        $this->PassWord = md5($PassWord);
    }

    public function checkUserPass()
    {
        $paramTypes = "ss";
        $Parameters = array($this->UserName, $this->PassWord);
        //print_r($Parameters);
        $result = database::ExecuteQuery('CheckUserPass', $paramTypes, $Parameters);
        
        if(mysqli_num_rows($result) > 0)
        {
            $row = $result->fetch_array();
            $this->setFname($row["Fname"]);
            //echo( $this->Fname);
            $this->setLname($row["Lname"]);
            $this->setEmail($row["Email"]);
            $this->setPhone($row["Phone"]);
            $this->setAddress($row["Address"]);
            return true;
        }
        return false;
    }
    public function GetUser()
    {
        $paramTypes = "s";
        $Parameters = array($this->UserName);
        $result = database::ExecuteQuery('GetUser', $paramTypes, $Parameters);
        //print_r($Parameters);
        if(mysqli_num_rows($result) > 0)
        {
            $row = $result->fetch_array();
            $this->setFname($row["Fname"]);
            $this->setLname($row["Lname"]);
            $this->setEmail($row["Email"]);
            $this->setPhone($row["Phone"]);
            $this->setAddress($row["Address"]);
            return true;
        }
        return false;
    }

    public function getUserAsaText()
    {
        return $this->UserName.' '.$this->PassWord.' '.$this->Fname.' '.$this->Lname.PHP_EOL;
    }

    public function IsUsernameExist()
    {
        $paramTypes = "s";
        $Parameters = array($this->UserName);
        $result = database::ExecuteQuery('IsUsernameExist', $paramTypes, $Parameters);

        if(mysqli_num_rows($result) > 0)
              return true;
        return false;
    }

    public function Save()
    {
        if(!$this->IsUsernameExist()) {
            $paramTypes = "sssssss";
            $Parameters = array($this->Fname, $this->Lname,$this->UserName, $this->PassWord,$this->Email,$this->Phone,$this->Address);
            //print_r($Parameters)  ;
            database::ExecuteQuery('AddUser', $paramTypes, $Parameters);
            return true;
        }
        return false;
    }
    public function UpdateUser($OldUserName)
    {
        $paramTypes = "ssssssss";
        $Parameters = array($this->UserName, $this->PassWord,
            $this->Fname, $this->Lname,$this->Email,$this->Phone,$this->Address,$OldUserName);
        database::ExecuteQuery('UpdateUser', $paramTypes, $Parameters);
    }

    public static function GetAllUsers()
    {
        $result = database::ExecuteQuery('GetAllUsers');
        $usersList = array();
        $i = 0;
        while ($row = $result->fetch_array())
        {
            $tempUser = new user();
            $tempUser->setUserName($row['UserName']);
            $tempUser->setFname($row['Fname']);
            $tempUser->setLname($row['Lname']);
            $usersList[$i++] = $tempUser;
        }
        return $usersList;
    }
}