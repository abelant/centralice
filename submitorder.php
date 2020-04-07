<?php
if(isset($_POST)) {
    
    $to = 'abelzahiri10@gmail.com';

    $subject = 'Order Request';
    
    

    $headers = "From: " . strip_tags($_POST['email']) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $message = '<b>Customer Details</b><br>
    Name: <strong>'.$_POST['name'].'</strong><br>
    Email: <strong>'.$_POST['email'].'</strong><br> 
    Phone: <strong>'.$_POST['phone'].'</strong><br>
    
    
    <br><b>Delivery Details</b><br>
    Postcode: <strong>'.$_POST['postcode1'].'</strong><br> 
    Address: <strong>'.$_POST['address'].'</strong><br> 
    Date: <strong>'.$_POST['date'].'</strong><br>
    Time: <strong>'.$_POST['time'].'</strong><br>
    <br><b>Order</b><br>
    BAGS OF ICE CUBES  : <strong>'.$_POST['nicecubes'].' Bags x </strong><br> 
    BAGS OF CRUSHED ICE : <strong>'.$_POST['ncrushedice'].' Bags x </strong><br>
    ICE BLOCKS : <strong>'.$_POST['niceblocks'].' Bags x </strong><br>    
    BAGS OF DRY ICE  : <strong>'.$_POST['ndryice'].' Bags x </strong><br>   
    BAGS OF PRE CUT CUBES  : <strong>'.$_POST['nprecut'].' Bags x </strong><br>  
    SIZE OF PRE CUT CUBES  : <strong>'.$_POST['nsize'].' </strong><br>    

    <br><b>Estimated Total: £ '.$_POST['ntotal'].'</b><br>';


    
    if(mail($to, $subject, $message, $headers)) {
       echo json_encode(array('status'=>1,'msg'=>'Request submitted successfully.'));
    } else {
       echo json_encode(array('status'=>0,'msg'=>'Something went wrong when submitting request. Please try again later or contact administrator'));
    }

} else {
          echo json_encode(array('status'=>0,'msg'=>'Something went wrong when submitting request. Please try again later or contact administrator'));
}