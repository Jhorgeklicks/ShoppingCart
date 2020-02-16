<?php 
include '../includes/Query.php';

    $obj = new Query;

    if(isset($_POST['price_id']) && isset($_POST['price_name']) && isset($_POST['price_image']) && isset($_POST['price_price']) && isset($_POST['pcode'])  ){

        $price_id =  $obj->PostData('price_id');
        $price_name =  $obj->PostData('price_name');
        $price_image =  $obj->PostData('price_image');
        $price_price =  $obj->PostData('price_price');
        $pcode =  $obj->PostData('pcode');
        $price_qty =  1;
        $total_price =  0;

        // echo  $price_id .' ' . $price_name . ' '. $price_image .' ' .$price_price;
        $query = $obj->execute_query("SELECT P_Code FROM Cart WHERE P_Code = '$pcode'; ");
        $result = mysqli_num_rows($query);
        // while($row = mysqli_fetch_assoc($query)){
        //      $code = $row['P_Code'];
        // }
        $code = mysqli_fetch_assoc($query);
        if(!$code){
            $sql = "INSERT INTO Cart(P_Name,P_Price,P_Image,P_Qty,T_Price,P_Code) VALUES('$price_name','$price_price','$price_image','$price_qty','$price_price','$pcode');";
            $query = $obj->execute_query($sql);

            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Product \'' . $price_name . '\' added to Cart</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Product \'' . $price_name . '\' already added to Cart</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        
        
    }

    if(isset($_GET['action'])){
        if(isset($_GET['action']) == "get_cart"){
            $query = $obj->execute_query("SELECT * FROM Cart");
            $result = mysqli_num_rows($query);
            echo $result;
        }
    }

    if(isset($_POST['action']) && isset($_POST['id'])){
        if($_POST['action'] == 'removeProduct'){
            $id = $_POST['id'];

            $sql = "DELETE FROM Cart WHERE Id = '$id' LIMIT 1;";
            $query = $obj->execute_query($sql);

            if($query){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Product has been removed successfuly</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error Occurred, Please try Removing Product later. Thanks</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }

        }
    }

    if(isset($_POST['action'])){
        if($_POST['action'] == 'clear_Cart'){
           

            $sql = "DELETE FROM Cart;";
            $query = $obj->execute_query($sql);

            if($query){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Your Cart has been Cleared Successfully</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error Occurred, Failed to Clear Your Cart. Please Try Again Later</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }

        }
    }

    if(isset($_POST['id']) && isset($_POST['price']) && isset($_POST['qty'])){
        $id     = $obj->PostData('id');
        $price  = $obj->PostData('price');
        $qty    = $obj->PostData('qty');

        if( empty($id) || empty($price) || empty($qty) ){
            return false;
            exit;
        }else{
            $total_price = $price * $qty;

            $sql = "UPDATE Cart SET P_Qty = '$qty' ,T_Price = '$total_price' WHERE Id = '$id' LIMIT 1;";
            $query = $obj->execute_query($sql);

            if($query){
                echo "";
            }
        }

        
    }
    
?>
