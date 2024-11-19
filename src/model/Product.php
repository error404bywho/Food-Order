<?php

class Product
{
    private $Id;
    private $Name;
    private $Image;
    private $Price;
    private $Voucher;
    private $Quantity;
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
        $Category = null,
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


    public function getId()
    {
        return $this->Id;
    }

    public function setId($Id)
    {
        $this->Id = $Id;
    }


    public function getName()
    {
        return $this->Name;
    }

    public function setName($Name)
    {
        $this->Name = $Name;
    }


    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;
    }


    public function getPrice()
    {
        return $this->Price;
    }

    public function setPrice($Price)
    {
        $this->Price = $Price;
    }


    public function getVoucher()
    {
        return $this->Voucher;
    }

    public function setVoucher($Voucher)
    {
        $this->Voucher = $Voucher;
    }


    public function getQuantity()
    {
        return $this->Quantity;
    }

    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }


    public function getHot()
    {
        return $this->Hot;
    }

    public function setHot($Hot)
    {
        $this->Hot = $Hot;
    }

  
    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }


    public function getCategory()
    {
        return $this->Category;
    }

    public function setCategory($Category)
    {
        $this->Category = $Category;
    }


    public function getActive()
    {
        return $this->Active;
    }

    public function setActive($Active)
    {
        $this->Active = $Active;
    }


    public function __toString()
    {
        return "Id: {$this->Id}, Name: {$this->Name}, Image: {$this->Image}, Price: {$this->Price}, Voucher: {$this->Voucher}, Quantity: {$this->Quantity}, Hot: {$this->Hot}, Description: {$this->Description}, Category: {$this->Category}, Active: {$this->Active}";
    }
}


?>