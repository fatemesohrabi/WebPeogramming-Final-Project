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
    public function GetProduct()
    {
        $paramTypes = "s";
        $Parameters = array($this->ProdName);
        $result = database::ExecuteQuery('GetProduct', $paramTypes, $Parameters);
        if(mysqli_num_rows($result) > 0)
        {
            $row = $result->fetch_array();
            $this->setInfo($row["Info"]);
            $this->setTechInfo($row["TechInfo"]);
            $this->setPrice($row["Price"]);
            $this->setCount($row["Count"]);
            $this->setPname($row["Pname"]);
            $this->setPic($row["Pic"]);

            return true;
        }
        return false;
    }

    public static function GetAllproducts()
    
    {
        $result = database::ExecuteQuery('GetAllproducts');
        $productList = array();
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
        return $productList;
    }
}
?>