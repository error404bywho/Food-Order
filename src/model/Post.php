<?php

class Post
{
    private $Id;
    private $Content;
    private $Rating;
    private $DateCreated;
    private $DateUpdated;
    private $IdUser;
    private $IdProduct;

    public function __construct(
        $Id = null,
        $Content = null,
        $Rating = null,
        $DateCreated = null,
        $DateUpdated = null,
        $IdUser = null,
        $IdProduct = null
    ) {
        $this->Id = $Id;
        $this->Content = $Content;
        $this->Rating = $Rating;
        $this->DateCreated = $DateCreated;
        $this->DateUpdated = $DateUpdated;
        $this->IdUser = $IdUser;
        $this->IdProduct = $IdProduct;
    }

    public function Get_Id()
    {
        return $this->Id;
    }

    public function Set_Id($Id)
    {
        $this->Id = $Id;
    }

    public function Get_Content()
    {
        return $this->Content;
    }

    public function Set_Content($Content)
    {
        $this->Content = $Content;
    }

    public function Get_Rating()
    {
        return $this->Rating;
    }

    public function Set_Rating($Rating)
    {
        $this->Rating = $Rating;
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

    public function Get_IdUser()
    {
        return $this->IdUser;
    }

    public function Set_IdUser($IdUser)
    {
        $this->IdUser = $IdUser;
    }

    public function Get_IdProduct()
    {
        return $this->IdProduct;
    }

    public function Set_IdProduct($IdProduct)
    {
        $this->IdProduct = $IdProduct;
    }

    public function __toString()
    {
        return "Id: {$this->Id}, Content: {$this->Content}, Rating: {$this->Rating}, DateCreated: {$this->DateCreated}, DateUpdated: {$this->DateUpdated}, IdUser: {$this->IdUser}, IdProduct: {$this->IdProduct}";
    }
}


?>