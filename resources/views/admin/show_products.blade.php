<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    @include('admin.assets.css')

</head>

<body>

    @include('admin.sidebar')

    <div class="content">
        <h3 class="mb-4">Hello , {{ Auth::user()->name }} 👋</h3>


        <div class="product-table-container table-responsive">
            <table class="table product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <img src="/product_images/{{ $product->image_path }}" alt="{{ $product->name }}">
                            </td>

                            <td>
                                <!-- Edit -->
                                <a href="{{ url('edit-product-view/' . $product->id) }}" class="btn btn-warning">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ url('delete-product/' . $product->id) }}" method="POST"
                                    style="display:inline-block; margin: 5px;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        @include('admin.assets.script')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>