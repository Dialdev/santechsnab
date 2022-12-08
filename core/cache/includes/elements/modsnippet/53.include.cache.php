<?php
$out = array();

//echo $_GET['price'];

if(!empty($_GET['price'])){
    $price = isset($_GET['price']) ? strip_tags($_GET['price']) : '';
    $prices = explode('|', $price);
    if (!empty($prices)) {
        $out[] = 'price>=' . $prices[0];
        $out[] = 'price<=' . $prices[1];
    }
    return implode(',', $out);
}else{
    //$out[] = 'price>=1';
    $out[] = 'price>=0';
    $out[] = 'price<=100000';
    return implode(',', $out);
}
//print_r($out);
//die();
return;
