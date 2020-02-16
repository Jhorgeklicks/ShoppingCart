<?php 
    include '../includes/Query.php';

    $obj = new Query;

    if(isset($_POST['products']) && isset($_POST['grand_total']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['address']) && isset($_POST['payment_mode'])){
        $product       = $obj->PostData('products');
        $grand_total   = $obj->PostData('grand_total');
        $name          = $obj->PostData('name');
        $email         = $obj->PostData('email');
        $tel           = $obj->PostData('tel');
        $address       = $obj->PostData('address');
        $payment_mode  = $obj->PostData('payment_mode');

        $data ='';

        if(empty($product || $grand_total || $name || $email || $tel || $address || $payment_mode)){
            echo "Please fill out all the fields";
        }else{
            
            $sql = "INSERT INTO Customer_Order(Product,T_Price,Name,Email,Phone_Number,Address,Payment_Mode)";
            $sql .= "VALUES('$product','$grand_total','$name','$email','$tel','$address','$payment_mode');";

            if( $obj->execute_query($sql)){
                $data .= '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <h2 class="display-4 text-center"><strong>Thank You!!</strong></h2>
                <h3 class="text-info">Your Order Has ben Sent successfully</h3>
                <h4 class="bg-danger textlight rounded p-4">items Purchased are : '. $product.'</h4>
                <h4>Your Name : '. $name.'</h4>
                <h4>Your Email : '. $email.'</h4>
                <h4>Your Phone Number : '. $tel.'</h4>
                <h4>Your Address : '. $address.'</h4>
                <h4>Total Amount Paid : GH&#xa2;'.number_format($grand_total, 2) .'</h4>
                <h4>Your Payment Method : '. $payment_mode.'</h4>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
              echo $data;
            }else{
                $data .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h2 class="display-4 text-center"><strong>Failed, Error Encountered!!</strong></h2>
                <h3 class="text-warning">Order Failed, please try again later.. Thanks</h3>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
                echo $data;
            }
        }
    }
?>
