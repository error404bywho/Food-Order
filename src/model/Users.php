<?php

class Users
{
    private $Id;
    private $Email;
    private $Password;
    private $Fullname;
    private $Phone;
    private $Birthday;
    private $Address;
    private $Balance;
    private $Role;
    private $DateCreated;
    private $DateUpdated;
    private $Status;

    public function __construct(
        $Id = null,
        $Email = null,
        $Password = null,
        $Fullname = null,
        $Phone = null,
        $Birthday = null,
        $Address = null,
        $Balance = null,
        $Role = null,
        $DateCreated = null,
        $DateUpdated = null,
        $Status = null
    ) {
        $this->Id = $Id;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Fullname = $Fullname;
        $this->Phone = $Phone;
        $this->Birthday = $Birthday;
        $this->Address = $Address;
        $this->Balance = $Balance;
        $this->Role = $Role;
        $this->DateCreated = $DateCreated;
        $this->DateUpdated = $DateUpdated;
        $this->Status = $Status;
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

    public function Get_Password()
    {
        return $this->Password;
    }

    public function Set_Password($Password)
    {
        $this->Password = $Password;
    }

    public function Get_Fullname()
    {
        return $this->Fullname;
    }

    public function Set_Fullname($Fullname)
    {
        $this->Fullname = $Fullname;
    }

    public function Get_Phone()
    {
        return $this->Phone;
    }

    public function Set_Phone($Phone)
    {
        $this->Phone = $Phone;
    }

    public function Get_Birthday()
    {
        return $this->Birthday;
    }

    public function Set_Birthday($Birthday)
    {
        $this->Birthday = $Birthday;
    }

    public function Get_Address()
    {
        return $this->Address;
    }

    public function Set_Address($Address)
    {
        $this->Address = $Address;
    }

    public function Get_Balance()
    {
        return $this->Balance;
    }

    public function Set_Balance($Balance)
    {
        $this->Balance = $Balance;
    }

    public function Get_Role()
    {
        return $this->Role;
    }

    public function Set_Role($Role)
    {
        $this->Role = $Role;
    }

    public function Get_DateCreated()
    {
        return $this->DateCreated;
    }

    public function Set_DateCreated($DateCreated)
    {
        $this->DateCreated = $DateCreated;
    }

    public function Get_DateUpdated()
    {
        return $this->DateUpdated;
    }

    public function Set_DateUpdated($DateUpdated)
    {
        $this->DateUpdated = $DateUpdated;
    }

    public function Get_Status()
    {
        return $this->Status;
    }

    public function Set_Status($Status)
    {
        $this->Status = $Status;
    }

    public function __toString()
    {
        return "Id: {$this->Id}, Email: {$this->Email}, Fullname: {$this->Fullname}, Phone: {$this->Phone}, Birthday: {$this->Birthday}, Address: {$this->Address}, Balance: {$this->Balance}, Role: {$this->Role}, DateCreated: {$this->DateCreated}, DateUpdated: {$this->DateUpdated}, Status: {$this->Status}";
    }
}


?>