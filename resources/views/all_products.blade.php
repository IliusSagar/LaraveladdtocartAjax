<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary CSS and JavaScript libraries -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    @php
    $product = App\Models\Product::get(); // Assuming 'Product' is your model
@endphp

<span id="cart-count">{{ Cart::count() }}</span>

<br>

@foreach ($product as $item)
    <form id="add-to-cart-form-{{ $item->id }}" action="{{ url('all/cart/product/add/'.$item->id)}}" method="post">
        @csrf
        
        <h3>Name: {{ $item->name }}</h3>
        <h3>Price: {{ $item->price }}</h3>
        <div class="product__details__quantity">
            <div class="quantity">
                <div class="pro-qty">
                    <input type="text" value="1" name="qty" id="qty-{{ $item->id }}"> 
                </div>
            </div>
        </div>
        <input type="hidden" name="action" value="add_to_cart">
        <button type="submit" class="primary-btn" name="action" value="add_to_cart" style="font-family: 'Roboto Condensed', sans-serif;">ADD TO CART</button>
    </form>
@endforeach

<script>
$(document).ready(function () {
    $('[id^="add-to-cart-form-"]').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        var productId = form.attr('id').split('-').pop(); // Extract the product id from the form id
        var cart = $("#cart-count");
        var qt = $("#qty-" + productId).val(); // Get the value of the quantity input

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                // Increment cart count by the quantity entered
                cart.text(parseInt(cart.text()) + parseInt(qt));
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
