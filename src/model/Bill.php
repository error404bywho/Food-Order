<?php

class Bill
{
    private $Id;
    private $Email;
    private $Address;
    private $Phone;
    private $Content;
    private $TotalAmount;
    private $DiscountAmount;
    private $FinalAmount;
    private $IdUser;
    private $IdVoucher;
    private $DateCreated;

    private $payment_status;

    public function __construct(
        $Id = null,
        $Email = null,
        $Address = null,
        $Phone = null,
        $Content = null,
        $TotalAmount = null,
        $DiscountAmount = null,
        $FinalAmount = null,
        $IdUser = null,
        $IdVoucher = null,
        $DateCreated = null,
        $payment_status = null
    ) {
        $this->Id = $Id;
        $this->Email = $Email;
        $this->Address = $Address;
        $this->Phone = $Phone;
        $this->Content = $Content;
        $this->TotalAmount = $TotalAmount;
        $this->DiscountAmount = $DiscountAmount;
        $this->FinalAmount = $FinalAmount;
        $this->IdUser = $IdUser;
        $this->IdVoucher = $IdVoucher;
        $this->DateCreated = $DateCreated;
        $this->$payment_status = $payment_status;
    }
    public function Get_payment_status()
    {
        return $this->Id;
    }

    public function Set_payment_status($payment_status)
    {
        $this->payment_status = $payment_status;
    }
    public function Get_Id()
    {
        return $this->Id;
    }

    public function Set_Id($Id)
    {
        $this->Id = $Id;
    }

    public function Get_Email()
    {
        return $this->Email;
    }

    public function Set_Email($Email)
    {
        $this->Email = $Email;
    }

    public function Get_Address()
    {
        return $this->Address;
    }

    public function Set_Address($Address)
    {
        $this->Address = $Address;
    }

    public function Get_Phone()
    {
        return $this->Phone;
    }

    public function Set_Phone($Phone)
    {
        $this->Phone = $Phone;
    }

    public function Get_Content()
    {
        return $this->Content;
    }

    public function Set_Content($Content)
    {
        $this->Content = $Content;
    }

    public function Get_TotalAmount()
    {
        return $this->TotalAmount;
    }

    public function Set_TotalAmount($TotalAmount)
    {
        $this->TotalAmount = $TotalAmount;
    }

    public function Get_DiscountAmount()
    {
        return $this->DiscountAmount;
    }

    public function Set_DiscountAmount($DiscountAmount)
    {
        $this->DiscountAmount = $DiscountAmount;
    }

    public function Get_FinalAmount()
    {
        return $this->FinalAmount;
    }

    public function Set_FinalAmount($FinalAmount)
    {
        $this->FinalAmount = $FinalAmount;
    }

    public function Get_IdUser()
    {
        return $this->IdUser;
    }

    public function Set_IdUser($IdUser)
    {
        $this->IdUser = $IdUser;
    }

    public function Get_IdVoucher()
    {
        return $this->IdVoucher;
    }

    public function Set_IdVoucher($IdVoucher)
    {
        $this->IdVoucher = $IdVoucher;
    }

    public function Get_DateCreated()
    {
        return $this->DateCreated;
    }

    public function Set_DateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;
    }

    public function __toString()
    {
        return "Id: {$this->Id}, Email: {$this->Email}, Address: {$this->Address}, Phone: {$this->Phone}, Content: {$this->Content}, TotalAmount: {$this->TotalAmount}, DiscountAmount: {$this->DiscountAmount}, FinalAmount: {$this->FinalAmount}, IdUser: {$this->IdUser}, IdVoucher: {$this->IdVoucher}, DateCreated: {$this->DateCreated}";
    }
}


?>