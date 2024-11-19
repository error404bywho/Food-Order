<?php
include'Bill.php';
include'Category.php';
include'Post.php';
include'Product.php';
include'Users.php';
include'Voucher_Usage.php';
include'Voucher.php';

$b=new Bill("","","","");
$c=new Category("","","","");
$po=new Post("","","","");
$p=new Product("","","","");
$u=new Users("");
$vu=new Voucher_Usage("","","","");
$v=new Voucher("","","");

echo'<b>Bill:</b>'.$b->__toString();echo'<br>';echo'<br>';
echo'<b>Category:</b>'.$c->__toString();echo'<br>';echo'<br>';
echo'<b>Post:</b>'.$po->__toString();echo'<br>';echo'<br>';
echo'<b>Product:</b>'.$p->__toString();echo'<br>';echo'<br>';
echo'<b>Users:</b>'.$u->__toString();echo'<br>';echo'<br>';
echo'<b>Voucher Usage:</b>'.$vu->__toString();echo'<br>';echo'<br>';
echo'<b>Voucher:</b>'.$v->__toString();echo'<br>';echo'<br>';


?>