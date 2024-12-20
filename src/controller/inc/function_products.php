<?php
include_once 'conn.php';
include_once '../model/Category.php';
function Select_Product(){
global $pdo;
$products = [];
$query = $pdo->prepare("SELECT * FROM product");
    try{
    $query->execute();    
        while($result = $query->fetch()){
            $Id = $result['id'];
            $Name =  $result['name'];
            $Image =  $result['image'];
            $Price =  $result['price'];
            $Voucher =  $result['voucher'];
            $Quantity = 0;
            $Hot =  $result['hot'];
            $Description =  $result['description'];
            $c=new Category("","","","");
            switch ($result['idCategory']){
                case 1 :  $Category =  new Category(1,"Pizza","assets/images/pizza/pizza_model.png",1); break;
                case 2 :  $Category =  new Category(2,"drinks","assets/images/pizza/drinks_model.png",1); break;
                case 3 :  $Category =  new Category(3,"fried","assets/images/pizza/fried.png",1); break;
                case 4 :  $Category =  new Category(4,"burger","assets/images/pizza/burger_model.png",1); break;
                case 5 :  $Category =  new Category(5,"chicken","assets/images/pizza/chicken_model.png",1); break;
                default:  break;
            }
            $Active =  $result['active'];
        $product = new Product($Id,$Name,$Image,$Price,$Voucher,$Quantity,$Hot,$Description,$Category,$Active);
        array_push($products,$product);
        }
        return $products;
    }catch (Exception $e){

    }
}
function formatNumber($number) {
    return number_format($number, 0, '', '.');
}

?>