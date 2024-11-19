<?php 

class Voucher
{
    private $Id;
    private $Code;
    private $Description;
    private $DiscountValue;
    private $Type;
    private $ValidFrom;
    private $ValidTo;
    private $Active;

    public function __construct(
        $Id = null,
        $Code = null,
        $Description = null,
        $DiscountValue = null,
        $Type = null,
        $ValidFrom = null,
        $ValidTo = null,
        $Active = null
    ) {
        $this->Id = $Id;
        $this->Code = $Code;
        $this->Description = $Description;
        $this->DiscountValue = $DiscountValue;
        $this->Type = $Type;
        $this->ValidFrom = $ValidFrom;
        $this->ValidTo = $ValidTo;
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

    public function Get_Code()
    {
        return $this->Code;
    }

    public function Set_Code($Code)
    {
        $this->Code = $Code;
    }

    public function Get_Description()
    {
        return $this->Description;
    }

    public function Set_Description($Description)
    {
        $this->Description = $Description;
    }

    public function Get_DiscountValue()
    {
        return $this->DiscountValue;
    }

    public function Set_DiscountValue($DiscountValue)
    {
        $this->DiscountValue = $DiscountValue;
    }

    public function Get_Type()
    {
        return $this->Type;
    }

    public function Set_Type($Type)
    {
        $this->Type = $Type;
    }

    public function Get_ValidFrom()
    {
        return $this->ValidFrom;
    }

    public function Set_ValidFrom($ValidFrom)
    {
        $this->ValidFrom = $ValidFrom;
    }

    public function Get_ValidTo()
    {
        return $this->ValidTo;
    }

    public function Set_ValidTo($ValidTo)
    {
        $this->ValidTo = $ValidTo;
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
        return "Id: {$this->Id}, Code: {$this->Code}, Description: {$this->Description}, DiscountValue: {$this->DiscountValue}, Type: {$this->Type}, ValidFrom: {$this->ValidFrom}, ValidTo: {$this->ValidTo}, Active: {$this->Active}";
    }
}


?>