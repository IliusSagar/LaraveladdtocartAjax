<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary CSS and JavaScript libraries -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    @php
    $product = App\Models\Product::find(2); // Assuming 'Product' is your model
@endphp

<span id="cart-count" >{{ Cart::count() }}</span>



<form id="add-to-cart-form" action="{{ url('cart/product/add/'.$product->id)}}" method="post">
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
    <button type="submit" class="primary-btn" name="action" value="add_to_cart" style="font-family: 'Roboto Condensed', sans-serif;">ADD TO CART</button>
</form>


<script>
    $(document).ready(function () {
        $('#add-to-cart-form').submit(function (e) {
            e.preventDefault();

            var form = $(this);
            var cart = $("#cart-count");

            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Increment cart count by 1
                    cart.text(parseInt(cart.text()) + 1);
                   
                },
                error: function (error) {
                    console.log(error);
                },
            });
        });
    });
</script>






</body>
</html>
