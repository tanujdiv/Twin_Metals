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
        <div class="row g-6 justify-content-center"> <!-- ADD THIS CLASS -->

            <!-- Billing Details -->
            <div class="col-lg-8">
                <div class="card checkout-card p-4">
                    <h4 class="mb-3 fw-semibold">Billing Details</h4>

                    <form action="{{ url('placeOrder') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter full name">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="enter street address">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" placeholder="enter city">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state" placeholder="enter state">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="text" class="form-control" name="pincode" placeholder="enter pincode">
                            </div>
                        </div>

                        <button class="btn btn-primary w-100 mt-3">Proceed to Payment</button>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- footer --}}
    @include('user.footer')
    {{-- end footer --}}


    {{-- scripts --}}
    @include('user.script')
    {{-- end scripts --}}


</body>

</html>