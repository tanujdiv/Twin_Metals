  <div class="sidebar position-fixed p-3">
    <h4 class="text-white mb-4">Dashboard</h4>
    <a href="#"><i class="bi bi-speedometer2"></i> Overview</a>
    <a href="#"><i class="bi bi-people"></i> Users</a>
    <a href="#"><i class="bi bi-bag"></i> Orders</a>
    <a href={{ url('addproductview') }}><i class="bi bi-plus-circle"></i> Add Product</a>
    <a href="#"><i class="bi bi-bar-chart"></i> Analytics</a>
    <a href="#"><i class="bi bi-gear"></i> Settings</a>
    <form  action="{{ route('logout') }}" method="post">@csrf
    <a><button style="text-decoration: none" type="submit" class="btn btn-link text-white p-0"><i class="bi bi-box-arrow-right"></i> Logout</button></a></form>
  </div>