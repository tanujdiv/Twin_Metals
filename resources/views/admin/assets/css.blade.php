<style>
  body {
    background-color: #f5f5f5;
  }

  .sidebar {
    width: 250px;
    height: 100vh;
    background: #0d6efd;
  }

  .sidebar a {
    color: #ffffff;
    text-decoration: none;
    display: block;
    padding: 12px 20px;
    font-size: 16px;
  }

  .sidebar a:hover {
    background: rgba(255, 255, 255, 0.1);
  }

  .content {
    margin-left: 250px;
    padding: 20px;
  }

  .card {
    border-radius: 10px;
  }

  h3 {
    font-weight: 600;
    color: #0d6efd;
  }

  .product-table-container {
    padding: 20px;
  }

  table.product-table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  table.product-table th {
    background: #343a40;
    color: #fff;
    padding: 12px;
    font-size: 15px;
    text-align: center;
  }

  table.product-table td {
    padding: 12px;
    font-size: 14px;
    vertical-align: middle;
    text-align: center;
    border: 1px solid #e5e5e5;
  }

  table.product-table img {
    width: 80px;
    height: auto;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
  }

  /* Hover effect */
  table.product-table tbody tr:hover {
    background: #f8f9fa;
    transition: 0.3s;
  }

  /* Responsive */
  @media (max-width: 768px) {

    table.product-table th,
    table.product-table td {
      font-size: 12px;
      padding: 8px;
    }

    table.product-table img {
      width: 50px;
    }
  }

  @media (max-width: 480px) {
    table.product-table {
      font-size: 10px;
    }

    table.product-table th,
    table.product-table td {
      padding: 6px;
    }

    table.product-table img {
      width: 40px;
    }
  }
</style>