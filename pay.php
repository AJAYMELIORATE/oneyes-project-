<style>
    .razorpay-payment-button
    {
        padding :4px;
        background-color: #5A9E6F;
        color: #fff;
        border:0;
    }
</style>
<?php

require 'config.php';
require 'razorpay-php/Razorpay-php';
session_start();
//create the Razorpay order

use Razorpay\Api\Api;
$api=new Api($keyId,$keySecret);
$price=$_POST['price'];
$customer=$_POST['user_name'];
$Email=$_POST['user_email'];
$contact=$_POST['user_phone'];

$_SESSION['Email']=$Email;
$_SESSION['price']=$price;

$orderData=
{
    'receipt' =>3456,
    ''
}
