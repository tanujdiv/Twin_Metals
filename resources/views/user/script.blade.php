<script>

  let cart = {}; // { productId: qty }
  let lastModalProductId = null;

  function renderProducts(list = products) {
    const grid = document.getElementById('productGrid');
    grid.innerHTML = '';
    if (!list.length) {
      document.getElementById('noResults').classList.remove('d-none');
      return;
    } else document.getElementById('noResults').classList.add('d-none');

    list.forEach(p => {
      const col = document.createElement('div');
      col.className = 'col-6 col-md-4';
      col.innerHTML = `
        <div class="card product-card h-100">
          <div class="position-relative p-3">
            ${p.oldPrice ? '<span class="badge badge-sale text-white position-absolute" style="left:12px;top:12px;padding:.45rem .6rem;border-radius:.5rem">Sale</span>' : ''}
            <img src="${p.img}" class="product-img w-100" alt="${escapeHtml(p.title)}">
          </div>
          <div class="card-body d-flex flex-column">
            <h6 class="card-title mb-1">${escapeHtml(p.title)}</h6>
            <p class="text-muted small mb-2">${escapeHtml(p.desc)}</p>
            <div class="mt-auto d-flex align-items-center justify-content-between">
              <div>
                <div class="fw-bold">₹${formatPrice(p.price)}</div>
                ${p.oldPrice ? `<div class="price-old">₹${formatPrice(p.oldPrice)}</div>` : ''}
              </div>
              <div class="d-flex flex-column align-items-end">
                <div>
                  <button class="btn btn-sm btn-outline-secondary me-2" onclick="openProductModal(${p.id})">View</button>
                  <button class="btn btn-sm btn-primary" onclick="addToCart(${p.id},1)">Add</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      `;
      grid.appendChild(col);
    });
  }

  function escapeHtml(s) { return String(s).replace(/[&<>\"]/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '\"': '&quot;' }[c] || c)) }
  function formatPrice(n) { return n.toFixed(2); }

  function addToCart(id, qty = 1) {
    cart[id] = (cart[id] || 0) + qty;
    showCartCount();
    showToast('Added to cart');
  }

  function addToCartFromModal() {
    const qty = Number(document.getElementById('modalQty').value) || 1;
    addToCart(lastModalProductId, qty);
    const modalEl = document.getElementById('productModal');
    const modal = bootstrap.Modal.getInstance(modalEl);
    modal.hide();
  }

  function showCartCount() {
    const count = Object.values(cart).reduce((a, b) => a + b, 0);
    const el = document.getElementById('cartCount');
    if (count > 0) { el.classList.remove('d-none'); el.textContent = count; } else el.classList.add('d-none');
  }

  function openProductModal(id) {
    const p = products.find(x => x.id === id); if (!p) return;
    lastModalProductId = p.id;
    document.getElementById('modalImg').src = p.img;
    document.getElementById('modalTitle').textContent = p.title;
    document.getElementById('modalDesc').textContent = p.desc;
    document.getElementById('modalPrice').textContent = '₹' + formatPrice(p.price);
    document.getElementById('modalOldPrice').textContent = p.oldPrice ? '₹' + formatPrice(p.oldPrice) : '';
    document.getElementById('modalQty').value = 1;
    const modal = new bootstrap.Modal(document.getElementById('productModal'));
    modal.show();
  }

  function renderCart() {
    const container = document.getElementById('cartItems');
    container.innerHTML = '';
    const entries = Object.entries(cart);
    if (!entries.length) { document.getElementById('cartEmpty').classList.remove('d-none'); document.getElementById('cartTotal').textContent = '₹0.00'; return; }
    document.getElementById('cartEmpty').classList.add('d-none');

    let total = 0;
    entries.forEach(([id, qty]) => {
      const p = products.find(x => x.id == id);
      const line = p.price * qty; total += line;
      const div = document.createElement('div');
      div.className = 'd-flex align-items-center gap-3 mb-3';
      div.innerHTML = `
        <img src="${p.img}" style="width:72px;height:72px;object-fit:cover;border-radius:.5rem">
        <div class="flex-grow-1">
          <div class="fw-bold">${escapeHtml(p.title)}</div>
          <div class="text-muted small">₹${formatPrice(p.price)} × ${qty} = ₹${formatPrice(line)}</div>
        </div>
        <div class="text-end">
          <div class="btn-group btn-group-sm" role="group">
            <button class="btn btn-outline-secondary" onclick="changeQty(${p.id}, ${qty - 1})">-</button>
            <button class="btn btn-outline-secondary" onclick="changeQty(${p.id}, ${qty + 1})">+</button>
            <button class="btn btn-outline-danger" onclick="removeFromCart(${p.id})"><i class="bi bi-trash"></i></button>
          </div>
        </div>
      `;
      container.appendChild(div);
    });
    document.getElementById('cartTotal').textContent = '₹' + formatPrice(total);
  }

  function changeQty(id, newQty) {
    if (newQty <= 0) { delete cart[id]; } else cart[id] = newQty;
    renderCart(); showCartCount();
  }
  function removeFromCart(id) { delete cart[id]; renderCart(); showCartCount(); }

  // Simple filter & sort
  function filterProducts(q) { q = (q || '').toLowerCase().trim(); renderProducts(products.filter(p => p.title.toLowerCase().includes(q) || p.desc.toLowerCase().includes(q))); }
  function sortProducts(mode) { let copy = [...products]; if (mode === 'price-asc') copy.sort((a, b) => a.price - b.price); else if (mode === 'price-desc') copy.sort((a, b) => b.price - a.price); renderProducts(copy); }

  // When cart modal opens, populate items
  document.getElementById('cartModal').addEventListener('show.bs.modal', renderCart);

  // Toast helper (small inline toast)
  function showToast(msg) {
    const el = document.createElement('div');
    el.className = 'toast align-items-center text-bg-dark border-0 position-fixed p-2';
    el.style.right = '20px'; el.style.bottom = '20px'; el.style.zIndex = 9999;
    el.innerHTML = `<div class="d-flex"><div class="toast-body">${escapeHtml(msg)}</div><button type="button" class="btn-close btn-close-white ms-2 me-1" aria-label="Close"></button></div>`;
    document.body.appendChild(el);
    const btn = el.querySelector('.btn-close'); btn.onclick = () => el.remove();
    setTimeout(() => el.remove(), 1800);
  }


  // Initial render
  renderProducts();
  showCartCount();

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
  // Create map instance
  const map = L.map('userMap').setView([20.5937, 78.9629], 5); // Default India view

  // Add OpenStreetMap Tiles
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
  }).addTo(map);

  // Detect User Location
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        map.setView([lat, lon], 13);

        L.marker([lat, lon])
          .addTo(map)
          .bindPopup("<b>You are here!</b>")
          .openPopup();
      },
      (error) => {
        console.log("Location blocked or unavailable");
      }
    );
  } else {
    alert("Geolocation is not supported by this browser.");
  }
</script>