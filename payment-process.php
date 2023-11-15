<?php
     
 $data = [ 
         'payment_id' => $_POST['razorpay_payment_id'],
         'amount' => $_POST['guests'],
        ];
 
 
 $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
 
 echo json_encode($arr);

?>