<style>
  /* Simple custom styles */
  body {
    background: #f8f9fa;
  }

  .product-card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: 0.3s ease-in-out;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
  }

  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
  }

  .product-card img {
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    transition: 0.3s ease;
  }

  .product-card:hover img {
    transform: scale(1.05);
  }

  /* Dropdown selector */
  #sortSelect {
    border-radius: 8px;
    font-size: 14px;
  }

  /* See More Button */
  .see-more-btn {
    padding: 8px 25px;
    border-radius: 8px;
    font-size: 15px;
  }

  .hero {
    background: linear-gradient(90deg, #fff 0%, #f1f5f9 100%);
    border-radius: .75rem;
  }

  .product-card {
    transition: transform .15s ease, box-shadow .15s ease;
  }

  .product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 20px rgba(20, 20, 50, .08);
  }

  .product-img {
    height: 180px;
    object-fit: cover;
    border-radius: .5rem;
  }

  .badge-sale {
    background: #ff6b6b;
  }

  .price-old {
    text-decoration: line-through;
    color: #888;
    font-size: .9rem
  }

  footer {
    background: #fff;
  }

  .cart-count {
    position: absolute;
    top: 6px;
    right: 6px;
    font-size: .75rem;
  }

  .cart-card {
    border-radius: 15px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  .cart-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 10px;
  }

  .qty-box {
    width: 70px;
  }

  .btn-remove {
    color: #dc3545;
    font-size: 14px;
    cursor: pointer;
  }

  .btn-remove:hover {
    text-decoration: underline;
  }

  .summary-card {
    border-radius: 15px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  /* Responsive Media Queries */
  @media (max-width: 992px) {
    .hero h1 {
      font-size: 2rem;
    }

    .hero p {
      font-size: 1rem;
    }

    .navbar-brand {
      font-size: 1.2rem;
    }
  }

  @media (max-width: 768px) {
    .product-card img {
      height: 180px;
    }

    .hero {
      padding: 2rem 1rem;
    }
  }

  @media (max-width: 576px) {
    .hero h1 {
      font-size: 1.7rem;
    }

    .hero p {
      font-size: 0.9rem;
    }

    .btn {
      padding: 0.4rem 0.8rem;
      font-size: 0.8rem;
    }
  }
</style>