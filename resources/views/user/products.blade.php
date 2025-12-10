<main class="container mb-5">
  <section id="products">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="h4">Products</h2>
      <div>
        <select id="sortSelect" class="form-select form-select-sm" style="width:170px" onchange="sortProducts(this.value)">
          <option value="default">Sort: Featured</option>
          <option value="price-asc">Price: Low to High</option>
          <option value="price-desc">Price: High to Low</option>
        </select>
      </div>
    </div>

    <div id="productGrid" class="row g-3"></div>

    <div id="noResults" class="text-center text-muted my-4 d-none">No products found.</div>
  </section>
<center>
  <form action="{{ url('Allproducts') }}" method="post" style="margin: 15px;">
    @csrf
    <button class="btn btn-primary">See More</button>
  </form>
</center>
  <hr class="my-5">

