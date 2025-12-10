<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ShopX — E‑commerce Template</title>

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

{{-- header --}}
@include('header')
{{-- end header --}}

{{-- Products --}}
@include('user.products')
{{-- end Products --}}

{{-- about --}}
@include('user.about')
{{-- end about --}}

{{-- footer --}}
@include('user.footer')
{{-- end footer --}}


{{-- add cart & cart view --}}
@include('user.add to cart and cart view')
{{-- end add cart & cart view --}}

{{-- scripts --}}
@include('user.script')
{{-- end scripts --}}


</body>
</html>
