<?php
class Category {
    
    private $Id;
    private $Name;
    private $Image;
    private $Active;

    
    public function __construct(
        $Id = "null",
        $Name = "null",
        $Image = "null",
        $Active = "null"
        )
    {
        $this->Id = $Id;
        $this->Name = $Name;
        $this->Image = $Image;
        $this->Active = $Active;
    }

    public function Get_Id(){
        return $this->Id;
    }

    
    public function Set_Id($Id){
        $this->Id = $Id;
    }

    public function Get_Name(){
        return $this->Name;
    }

    public function Set_Name($Name){
        $this->Id = $Name;
    }

    public function Get_Image(){
        return $this->Image;
    }

    public function Set_Image($Image){
        $this->Image = $Image;
    }

    public function Get_Active(){
        return $this->Active;
    }

    public function Set_Active($Active){
        $this->Active = $Active;
    }

    public function __toString()
    {
        return "Id: {$this->Id}, Name: {$this->Name}, Image: {$this->Image}, Active: {$this->Active}";
    }
    
}
?>