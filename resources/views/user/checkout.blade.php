<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout Page</title>

<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>

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
        <div class="row g-6 justify-content-center">

            <!-- Billing Details -->
            <div class="col-lg-8">
                <div class="card checkout-card p-4">
                    <h4 class="mb-3 fw-semibold">Billing Details</h4>

                    <form action="{{ url('place-order') }}" method="post">
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
                            <input type="text" class="form-control" name="address" placeholder="Enter address">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter city">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state" placeholder="Enter state">
                            </div>

                            <div class="col-md-3 mb-3">
                                <label class="form-label">Pincode</label>
                                <input type="text" class="form-control" name="pincode" placeholder="Enter pincode">
                            </div>
                        </div>

                        <input type="hidden" name="total" value="{{ $total }}">

                        <button class="btn btn-primary w-100 mt-3">Proceed to Payment</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


    {{-- footer --}}
@include('user.footer')
{{-- end footer --}}

{{-- scripts --}}
@include('user.script')
{{-- end scripts --}}

</body>

</html>