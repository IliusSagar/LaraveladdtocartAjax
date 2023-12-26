<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    @php
    $product = App\Models\Product::find(2); // Assuming 'Product' is your model
@endphp

<span >{{ Cart::count() }}</span>

    <form action="{{ url('cart/product/add/'.$product->id)}}" method="post">
        @csrf     

            <br>

        

            <div class="product__details__quantity">
                <div class="quantity">
                    <div class="pro-qty">
                        <input type="text" value="1" name="qty">
                    </div>
                </div>
            </div> 
            
         
            <input type="hidden" name="action" value="add_to_cart">
       

            <button type="submit" class="primary-btn" name="action" value="buy_now" style="font-family: 'Roboto Condensed', sans-serif;">Buy Now</button>
            <button type="submit" class="primary-btn" name="action" value="add_to_cart" style="font-family: 'Roboto Condensed', sans-serif;">ADD TO CARD</button>

            <a  class="heart-icon addwishlist"  data-id="{{ $product->id}}"><span class="icon_heart_alt"></span></a>

        </form>

{{-- <script>
    // Ajax call to reload the div
    function reloadDiv() {
        $.ajax({
            url: '{{ route("reload.div") }}',
            type: 'GET',
            success: function (response) {
                // Update the content of the div with the new data
                $('#reloadableDiv').html(response.data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    // Call the function on page load or any other event
    $(document).ready(function () {
        reloadDiv();
    });
</script> --}}
</body>
</html>