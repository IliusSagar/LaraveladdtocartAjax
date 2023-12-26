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

<div>
    <div id="cartCount">Cart Count: 0</div>
</div>

<button class="addToCartBtn" data-product-id="{{ $product->id }}">Add to Cart</button>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('.addToCartBtn').on('click', function () {
            var productId = $(this).data('product-id');

            // Make an AJAX request
            $.ajax({
                type: 'POST',
                url: '{{ route('addToCart') }}', // Make sure to define this route in your routes file
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (data) {
                    // Update the cart count on success
                    $('#cartCount').text('Cart Count: ' + data.cartCount);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
</body>
</html>