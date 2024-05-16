<?php
function validateCustomerData($data) 
{
    if (empty($data['customerID'])) return "Customer ID is required.";
    if (empty($data['customerName'])) return "Customer Name is required.";
    if (empty($data['customerEmail'])) return "Customer Email is required.";
    if (empty($data['customerPassword'])) return "Customer Password is required.";
    return true;
}
?>