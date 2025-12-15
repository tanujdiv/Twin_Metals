<div class="row g-3">
  <div class="col-md-3">
    <div class="card p-3 shadow-sm text-center">
      <h4>{{ $totalusers }}</h4>
      <p class="text-muted mb-0">Users</p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3 shadow-sm text-center">
      <h4>{{ $ordersCount }}</h4>
      <p class="text-muted mb-0">Orders</p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3 shadow-sm text-center">
      <h4>₹ {{ $sumtotal }}</h4>
      <p class="text-muted mb-0">Revenue</p>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card p-3 shadow-sm text-center">
      <h4>{{$pendingOrders}}</h4>
      <p class="text-muted mb-0">Pending</p>
    </div>
  </div>
</div>

<div class="mt-4 card shadow-sm p-3">
  <h5>Recent Orders</h5>
  <table class="table table-striped mt-3">
    <thead>
      <tr>
        <th>#</th>
        <th>User Name</th>
        <th>To The</th>
        <th>Product details</th>
        <th>Product image</th>
        <th>Qty</th>
        <th>Address</th>
        <th>Status</th>
        <th>Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $item)

        <?php  $productDetails = $item->product->name . ',' . $item->product->description; ?>
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->user->name }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $productDetails }}</td>
          <td><img style="width: 100px; height: 100px;" src="/product_images/{{ $item->product->image_path }}" alt=""></td>

          <td>{{ $item->total_items }}</td>
          <td>{{ $item->full_address }}</td>

          <td>
            <form action="{{ url('update-order-status/' . $item->id) }}" method="POST">
            
              @csrf
              <select class="form-select form-select-sm" name="status">
                <option selected value="{{ $item->status }}" >{{ $item->status }}</option>
                @if ($item->status == "pending")
                  <option value="completed">Completed</option>
                  <option value="canceled">Canceled</option>
                @elseif($item->status == "completed")
                  <option value="canceled">Canceled</option>
                  <option value="pending">Pending</option>
                @else
                  <option value="pending">Pending</option>
                  <option value="completed">Completed</option>
                @endif
              </select>
              <button style="margin-top: 2px" type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-primary">Update</button>
            </form>
          </td>

          <td>{{ $item->product->price * $item->total_items }}</td>

          <td>
            <form action="{{ url('delete-order/' . $item->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger">
                Delete
              </button>
            </form>
          </td>
        </tr>
      @endforeach


    </tbody>
  </table>
</div>