 <style>


  
  /* Simple custom styles */
    body { background: #f8f9fa; }
    .hero { background: linear-gradient(90deg,#fff 0%, #f1f5f9 100%); border-radius: .75rem; }
    .product-card { transition: transform .15s ease, box-shadow .15s ease; }
    .product-card:hover { transform: translateY(-6px); box-shadow: 0 10px 20px rgba(20,20,50,.08);} 
    .product-img { height: 180px; object-fit: cover; border-radius: .5rem; }
    .badge-sale { background: #ff6b6b; }
    .price-old { text-decoration: line-through; color: #888; font-size: .9rem }
    footer { background: #fff; }
    .cart-count { position: absolute; top: 6px; right: 6px; font-size: .75rem; }
    /* Responsive Media Queries */
  @media (max-width: 992px) {
    .hero h1 { font-size: 2rem; }
    .hero p { font-size: 1rem; }
    .navbar-brand { font-size: 1.2rem; }
  }
  @media (max-width: 768px) {
    .product-card img { height: 180px; }
    .hero { padding: 2rem 1rem; }
  }
  @media (max-width: 576px) {
    .hero h1 { font-size: 1.7rem; }
    .hero p { font-size: 0.9rem; }
    .btn { padding: 0.4rem 0.8rem; font-size: 0.8rem; }
  }
  </style>