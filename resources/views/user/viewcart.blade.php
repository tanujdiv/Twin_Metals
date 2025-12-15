<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ShopX — E‑commerce Template</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Bootstrap 5 -->



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!--Styles -->

    @include('user.style')

    {{-- end style --}}

</head>

<body>

    {{-- navbar --}}
    @include('user.nav')
    {{-- end navbar --}}


    <div class="container my-5">

        <h2 class="fw-bold mb-4">Your Shopping Cart</h2>

        <div class="row g-4">

            @if ($cartItems->isEmpty())
                <div style="height: 50vh; width: 100vw; margin-top: 200px;" >
                    <h1 class="row g-6 justify-content-center">Please Select The Product 😊</h1>
                </div>
            @else


                <!-- Cart Items -->
                <div class="col-lg-8">

                    @foreach($cartItems as $item)
                        <div class="cart-card mb-3 d-flex align-items-center justify-content-between">

                            <div class="d-flex align-items-center">
                                <img src="product_images/{{ $item->product->image_path }}" class="cart-img me-3"
                                    alt="{{ $item->product->name }}">
                                <div>
                                    <h6 class="fw-semibold mb-1">{{ $item->product->name }}</h6>
                                    <p class="text-muted small mb-0">₹{{ $item->product->price }}</p>
                                    <form action="{{ url('removeCartItem', $item->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-link btn-sm p-0 mt-1 text-danger">Remove</button>
                                    </form>

                                </div>
                            </div>

                            <div class="d-flex align-items-center">

                                <form action="{{ url('updateCart', $item->id) }}" method="post">
                                    @csrf
                                    <input type="number" class="form-control qty-box me-3" value="{{ $item->quantity }}" min="1"
                                        name="quantity">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                                <h6 class="fw-bold mb-0">₹{{ $item->product->price * $item->quantity }}</h6>
                            </div>

                        </div>
                    @endforeach

                </div>

                <!-- Cart Summary -->
                <div class="col-lg-4">
                    <div class="summary-card">
                        <h5 class="fw-bold mb-3">Order Summary</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <?php    $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity) ?>
                            <span>₹{{ $total }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            @if ($total <= 499)
                                <span>₹50</span>
                            @else
                                <span style="color:rgb(64, 186, 64)">Free</span>

                            @endif
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold mb-3">
                            <span>Total</span>
                            <span>₹{{ $total + ($total <= 499 ? 50 : 0) }}</span>
                        </div>

                        <form action="{{ url('checkout') }}" method="get">
                            @csrf
                            <button class="btn btn-primary w-100 py-2">Proceed to Checkout</button>
                        </form>
                    </div>
                </div>

            @endif
        </div>

    </div>

    {{-- footer --}}
    @include('user.footer')
    {{-- end footer --}}

    {{-- scripts --}}
    @include('user.script')
    {{-- end scripts --}}


</body>

</html>