<?php

class Voucher_Usage
{
    private $Id;
    private $IdVoucher;
    private $IdUser;
    private $IdBill;
    private $UsedAt;

    public function __construct($Id = null, $IdVoucher = null, $IdUser = null, $IdBill = null, $UsedAt = null)
    {
        $this->Id = $Id;
        $this->IdVoucher = $IdVoucher;
        $this->IdUser = $IdUser;
        $this->IdBill = $IdBill;
        $this->UsedAt = $UsedAt;
    }

    public function Get_Id()
    {
        return $this->Id;
    }
    
    public function Set_Id($Id)
    {
        $this->Id = $Id;
    }

    public function Get_IdVoucher()
    {
        return $this->IdVoucher;
    }

    public function Set_IdVoucher($IdVoucher)
    {
        $this->IdVoucher = $IdVoucher;
    }

    public function Get_IdUser()
    {
        return $this->IdUser;
    }

    public function Set_IdUser($IdUser)
    {
        $this->IdUser = $IdUser;
    }

    public function Get_IdBill()
    {
        return $this->IdBill;
    }

    public function Set_IdBill($IdBill)
    {
        $this->IdBill = $IdBill;
    }

    public function Get_UsedAt()
    {
        return $this->UsedAt;
    }

    public function Set_UsedAt($UsedAt)
    {
        $this->UsedAt = $UsedAt;
    }

    public function __toString()
    {
        return "Id: {$this->Id}, IdVoucher: {$this->IdVoucher}, IdUser: {$this->IdUser}, IdBill: {$this->IdBill}, UsedAt: {$this->UsedAt}";
    }
}


?>