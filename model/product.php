<?php
require_once "database.php";

class product
{
    public $ProdName;
    public $Info;
    public $TechInfo;
    public $Price;
    public $Count;
    public $Pname;
    public $Pic;


    public function getProdName()
    {
        return $this->ProdName;
    }
    public function setProdName($ProdName)
    {
        $this->ProdName = $ProdName;
    }


    public function getInfo()
    {
        return $this->Info;
    }
    public function setInfo($Info)
    {
        $this->Info = $Info;
    }

    public function getTechInfo()
    {
        return $this->TechInfo;
    }
    public function setTechInfo($TechInfo)
    {
        $this->TechInfo = $TechInfo;
    }

    public function getPrice()
    {
        return $this->Price;
    }
    public function setPrice($Price)
    {
        $this->Price = $Price;
    }

    public function getCount()
    {
        return $this->Count;
    }
    public function setCount($Count)
    {
        $this->Count = $Count;
    }

    
    public function getPname()
    {
        return $this->Pname;
    }
    public function setPname($Pname)
    {
        $this->Pname = $Pname;
    }

    public function getPic()
    {
        return $this->Pic;
    }
    public function setPic($Pic)
    {
        $this->Pic = $Pic;
    }

    function Save()
    {
            $Query = "INSERT INTO product(ProdName, Info, TechInfo, Price,'Count',Pname,Pic) VALUES ('".$this->ProdName."', '".$this->Info."', '".$this->TechInfo."', '".$this->Price."','".$this->Count."','".$this->Pname."','".$this->Pic."')";
            database::ExecuteQuery($Query);
            return true;
    }
    public static function GetAllproducts()
    {
        $Query="SELECT * FROM product WHERE 1";
        $result = database::ExecuteQuery ($Query);
        $productList=array();
        $i = 0;
        
        while ($row=$result->fetch_array())
        {
            $tempproduct= new product();
        
            $tempproduct->setProdName($row['ProdName']);
            $tempproduct->setInfo($row ['Info']);
            $tempproduct->setTechInfo($row ['TechInfo']);
            $tempproduct->setPrice($row ['Price']);

            $tempproduct->setCount($row ['Count']);

            $tempproduct->setPname($row ['Pname']);
            $tempproduct->setPic($row ['Pic']);
            $productList[$i++]=$tempproduct;
        }
        
        
        //print_r($productList);
        return $productList;
    }



}
?>