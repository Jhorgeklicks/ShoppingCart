<?php 
include '../includes/Query.php';
$obj = new Query;
    if(isset($_POST['action'])){
        if($_POST['action'] == 'fetch_cart'){

            $sql = "SELECT * FROM Cart";
            $query = $obj->execute_query($sql);
            mysqli_num_rows($query);
            $number = 1;
            $output ='';
            $grand_total = 0;
            
            while($row = mysqli_fetch_assoc($query)){
                $output .= "
                <tr>
                    <input type=\"hidden\" class=\"id\" value=". $row['Id'].">
                    <td>". $number++ ."</td>
                    <td>". $row['P_Name']."</td>
                    <td><img src=\"img/".$row['P_Image']."\" alt=\"image\" style=\"width:50px; height:50px\" class=\"img img-fluid img-rounded\"></td>
                    <td ><span>Gh&#xa2;</span>". number_format($row['P_Price'], 2 )."</td>

                    <input type=\"hidden\" class=\"price\" value=". $row['P_Price'].">

                    <td style=\"width:100px;\"><input type=\"number\" class=\"form-control priceQty\"  value=\"".$row['P_Qty']."\"></td>
                    <td><span>Gh&#xa2;</span>". number_format($row['T_Price'], 2 )."</td>
                    <td><button type=\"button\" data-id=\"".$row['Id']."\" class=\"badge badge-danger p-2 removeProduct\">Remove</button></td>
                </tr>";
                $grand_total += $row['T_Price'];
            }
            $output .="<tr>
                <td colspan=\"3\"><a href=\"index.php\" class=\"btn btn-info\">Continue Shopping</a></td>
                <td colspan=\"2\"><b>Grand Total</b></td>
                <td class=\"text-danger font-weight-bold\"><span>Gh&#xa2;</span>". number_format($grand_total, 2 ) ."</td>
                <td><a href=\"checkout.php\" id=\"disable\" data-total=\"$grand_total\" class=\"btn btn-success\">CheckOut</a></td>
                 </tr>
            </tbody>";
            echo $output;
            }
            
        }
?>