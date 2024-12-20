<?php

class Product
{
    private $Id;
    private $Name;
    private $Image;
    private $Price;
    private $Voucher;
    private $Quantity = 1;
    private $Hot;
    private $Description;
    private $Category;
    private $Active;

    // Constructor
    public function __construct(
        $Id = null,
        $Name = null,
        $Image = null,
        $Price = null,
        $Voucher = null,
        $Quantity = null,
        $Hot = null,
        $Description = null,
        Category $Category = null,
        $Active = null
    ) {
        $this->Id = $Id;
        $this->Name = $Name;
        $this->Image = $Image;
        $this->Price = $Price;
        $this->Voucher = $Voucher;
        $this->Quantity = $Quantity;
        $this->Hot = $Hot;
        $this->Description = $Description;
        $this->Category = $Category;
        $this->Active = $Active;
    }


    public function Get_Id()
    {
        return $this->Id;
    }

    public function Set_Id($Id)
    {
        $this->Id = $Id;
    }


    public function Get_Name()
    {
        return $this->Name;
    }

    public function Set_Name($Name)
    {
        $this->Name = $Name;
    }


    public function Get_Image()
    {
        return $this->Image;
    }

    public function Set_Image($Image)
    {
        $this->Image = $Image;
    }


    public function Get_Price()
    {
        return $this->Price;
    }

    public function Set_Price($Price)
    {
        $this->Price = $Price;
    }


    public function Get_Voucher()
    {
        return $this->Voucher;
    }

    public function Set_Voucher($Voucher)
    {
        $this->Voucher = $Voucher;
    }
    // Getter for $Quantity
    public function get_Quantity() {
        return $this->Quantity;
    }

    // Setter for $Quantity
    public function set_Quantity($quantity) {
        $this->Quantity = $quantity;
    }
    public function Get_Hot()
    {
        return $this->Hot;
    }

    public function Set_Hot($Hot)
    {
        $this->Hot = $Hot;
    }

  
    public function Get_Description()
    {
        return $this->Description;
    }

    public function Set_Description($Description)
    {
        $this->Description = $Description;
    }


    public function Get_Category()
    {
        return $this->Category;
    }

    public function Set_Category($Category)
    {
        $this->Category = $Category;
    }


    public function Get_Active()
    {
        return $this->Active;
    }

    public function Set_Active($Active)
    {
        $this->Active = $Active;
    }


    public function __toString()
    {
        return "Id: {$this->Id}, Name: {$this->Name}, Image: {$this->Image}, Price: {$this->Price}, Voucher: {$this->Voucher},  Hot: {$this->Hot}, Description: {$this->Description}, Category: {$this->Category}, Active: {$this->Active}";
    }
}


?>