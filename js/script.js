$(document).ready(function(){
    get_cart_number();
    fetchCart();
    $(".msg").show();

    $("#btn").click(function(){
        // $("#myform")[0].reset();
        $.ajax({
            type   : "POST",
            url    : "ajaxphp/postdata.php",
            data   : new FormData($("#myform")[0]),
            contentType: false,
            processData: false,
            cache : false,
            success :(response) =>{
                alert(response);
                $("#myform")[0].reset();
            }
        });
    });

        $("body").on("click", ".addItemBtn", function(evt){
            evt.preventDefault();
            $(".msg").show('slow');
            let price_id    = $(this).closest(".form-submit").find(".price_id").val();
            let price_name  = $(this).closest(".form-submit").find(".price_name").val();
            let price_image = $(this).closest(".form-submit").find(".price_image").val();
            let price_price = $(this).closest(".form-submit").find(".price_price").val();
            let pcode       = $(this).closest(".form-submit").find(".pcode").val();
    
            // console.log(pcode);
            $.ajax({
                type   : "POST",
                url    : "ajaxphp/addTocart.php",
                data   : {price_id:price_id,price_name:price_name,price_image:price_image,price_price:price_price,pcode:pcode},
                success: (response) =>{
                    $(".msg").html(response);
                    get_cart_number();
                  setTimeout(function(){
                    $(".msg").fadeOut('slow');
                  }, 2500);
                  window.scrollTo(0,0);
                }
            })
        })

    function get_cart_number(){
        var action = 'get_cart';
        $.ajax({
            type : "GET",
            url  :"ajaxphp/addTocart.php",
            data : {action:action},
            success: (response) =>{
                $("#card-badge-item").html(response);
            }
        });
    }

        function fetchCart(){
            var action = 'fetch_cart';
                $.ajax({
                    type : "POST",
                    url  :"ajaxphp/fetchCart.php",
                    data : {action:action},
                    success: (response) =>{
                        $("#table-body").html(response);

                        let grand_total = $("#disable").data("total");

                        if(grand_total === 0){
                            $("#disable").addClass('disabled');
                        }
                    }
                });
        }

    //  when the removeProduct btn is clicked
    $("body").on("click", ".removeProduct", function(){
            let action = 'removeProduct';
            let id = $(this).data('id');
        if(confirm('Do You Want Remove this Product From Your cart ?')){
            $.ajax({
                type   : "POST",
                url    : "ajaxphp/addTocart.php",
                data   : {action:action,id:id},
                success: (response) => {
                    $(".msg").html(response);
                     get_cart_number();
                     fetchCart();
                     setTimeout(function(){
                        $(".msg").fadeOut('slow');
                     }, 2500);

              window.scrollTo(0,0);
                
            }
            })
        }
    });
    
    // when clearCart is been clicked
    $("body").on("click",".clearCart", function(){
        let action = 'clear_Cart';
        if(confirm('Do You Want To Clear All Products From Your The cart ?')){
            $.ajax({
                type   : "POST",
                url    : "ajaxphp/addTocart.php",
                data   : {action:action},
                success: (response) => {
                    $(".msg").html(response);
                     get_cart_number();
                     fetchCart();
                     setTimeout(function(){
                        $(".msg").fadeOut('slow');
                     }, 2500);

              window.scrollTo(0,0);
                
            }
            })
        }
    });
// if the price quantity changes 
    $("body").on('change','.priceQty',function(){

        let id      = $(this).closest('tr').find('.id').val();
        let price   = $(this).closest('tr').find('.price').val();
        let qty     = $(this).closest('tr').find('.priceQty').val();

        if (Math.sign(qty) !== 1) {
            qty = 1;
        } 
       
    if(id !== '' && price !== '' && qty !==''){
            $.ajax({
                type   : "POST",
                url    : "ajaxphp/addTocart.php",
                data   : {id:id, price:price, qty:qty},
                cache  : false,
                success: (response) => {
                    console.log(response);
                     get_cart_number();
                     fetchCart();
            }
            })
        }
    });

    // place_order_btn is clicked
    $("body").on("click", "#place_order_btn", function(e){
        e.preventDefault();
        $.ajax({
            type  : "POST",
            url   : "ajaxphp/orderRequest.php",
            data  : $("#orderForm").serialize(),
            success: (response) => {
                $("#order").html(response);
            }
        });
    });
});