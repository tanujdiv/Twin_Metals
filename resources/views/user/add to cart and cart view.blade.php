<!-- Product Quick View Modal -->
<div class="modal fade" id="productModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-4">
        <div class="row g-3">
          <div class="col-md-6">
            <img id="modalImg" src="" class="img-fluid rounded" alt="">
          </div>
          <div class="col-md-6">
            <h5 id="modalTitle"></h5>
            <p id="modalDesc" class="text-muted"></p>
            <div class="mb-3">
              <span id="modalPrice" class="fs-4 fw-bold"></span>
              <span id="modalOldPrice" class="price-old ms-2"></span>
            </div>
            <div class="mb-3">
              <label class="form-label">Quantity</label>
              <input id="modalQty" type="number" min="1" value="1" class="form-control" style="width:90px">
            </div>
            <div class="d-flex gap-2">
              <button class="btn btn-primary" onclick="addToCartFromModal()">Add to cart</button>
              <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Cart Modal -->
<div class="modal fade" id="cartModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Your Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div id="cartItems"></div>
        <div id="cartEmpty" class="text-center text-muted py-4">Cart is empty.</div>
      </div>
      <div class="modal-footer d-flex justify-content-between align-items-center">
        <div>
          <small class="text-muted">Taxes and shipping calculated at checkout</small>
        </div>
        <div>
          <strong id="cartTotal">₹0.00</strong>
          <button class="btn btn-primary ms-3">Checkout</button>
        </div>
      </div>
    </div>
  </div>
</div>