<?php
require_once "database2.php";
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

    function getUserName()
    {
        return $this->UserName;
    }

    public function setUserName($UserName)
    {
        $this->UserName = $UserName;
    }

    function getPassWord()
    {
        return $this->PassWord;
    }

    function setPassWord($PassWord)
    {
        $this->PassWord = md5($PassWord);
    }

    function checkUserPass()
    {
        $paramTypes = "ss";
        $Parameters = array($this->UserName, $this->PassWord);
        $result = database::ExecuteQuery('CheckUserPass', $paramTypes, $Parameters);

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

    private function getUserAsaText()
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

    function Save()
    {
        if(!$this->IsUsernameExist()) {
            $paramTypes = "sssssss";
            $Parameters = array($this->UserName, $this->PassWord,
                $this->Fname, $this->Lname,$this->Email,$this->Phone,$this->Address);
            database::ExecuteQuery('AddUser', $paramTypes, $Parameters);
            return true;
        }
        return false;
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