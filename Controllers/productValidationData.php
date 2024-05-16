<?php
function validateProductData($data) 
{
    if (empty($data['id'])) return "Product ID is required.";
    if (empty($data['name'])) return "Product Name is required.";
    if (empty($data['details'])) return "Product Detail is required.";
    if (empty($data['price'])) return "Product Price is required.";
    return true;
}
?>