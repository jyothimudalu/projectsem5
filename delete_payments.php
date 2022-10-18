<?php
if(isset($_GET['delete_payments'])){
    $delete_id=$_GET['delete_payments'];
    //echo $delete_id;
    //delete query
    $delete_product="Delete from user_payments where payment_id=$delete_id";
    $result_product=mysqli_query($con,$delete_product);
    if($result_product){
        echo "<script>alert('Payment details deleted successfully')</script>";
        echo "<script>window.open('./list_payments.php','_self')</script>";

    }
}
?>