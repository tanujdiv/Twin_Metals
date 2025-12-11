<main class="container mb-5">
  <section id="products">

    <!-- Header + Sort -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="h4 fw-semibold mb-0">Products</h2>

      <form method="GET" action="{{ url('allproducts') }}" style="width:200px;">
        <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
            <option value="">Sort: Featured</option>
            <option value="price-asc" {{ request('sort')=='price-asc' ? 'selected' : '' }}>Price: Low to High</option>
            <option value="price-desc" {{ request('sort')=='price-desc' ? 'selected' : '' }}>Price: High to Low</option>
            <option value="latest" {{ request('sort')=='latest' ? 'selected' : '' }}>Latest</option>
        </select>
      </form>
    </div>

    <!-- Product Grid -->
    <div class="row g-4">
      @foreach ($products as $product)
      <div class="col-md-3">
        <div class="card product-card h-100" onclick="openProductModal({{ $product->id }})" style="cursor:pointer">

          <img src="{{ asset('product_images/'.$product->image_path) }}" 
               style="height:200px;object-fit:cover;width:100%;">

          <div class="card-body d-flex flex-column">
            <h5 class="card-title fw-semibold">{{ $product->name }}</h5>
            <p class="card-text text-muted small mb-2">{{ Str::limit($product->description, 50) }}</p>

            <div class="mt-auto d-flex align-items-center justify-content-between">
              <div class="fw-bold text-dark">₹{{ number_format($product->price, 2) }}</div>

              <button class="btn btn-primary btn-sm" 
                      onclick="event.stopPropagation(); addToCart({{ $product->id }}, 1)">
                Add
              </button>
            </div>
          </div>

        </div>
      </div>
      @endforeach
    </div>

    <div id="productGrid" class="row g-3"></div>
    <div id="noResults" class="text-center text-muted my-4 d-none">No products found.</div>

  </section>

  <hr class="my-5">
</main>
