<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    @include('admin.assets.css')

</head>

<body>

    @include('admin.sidebar')

    <div class="content">
        <h3 class="mb-4">Welcome, {{ Auth::user()->name }} 👋</h3>


        <div class="container mt-5">
            <div class="row">

                <!-- Add Category -->
                <div class="col-md-4">
                    <div class="card shadow-sm p-3">
                        <h5>Add Category</h5>
                        <form action="{{ url('add-category') }}" method="post">
                            @csrf
                            <input type="text" class="form-control mb-3" name="category_name"
                                placeholder="Category name">
                            <button type="submit" class="btn btn-success w-100">
                                Add Category
                            </button>
                        </form>

                        <div class="mt-3">
                            <strong>Category List:</strong>
                            <ul id="categoryList" class="list-group mt-2">
                                <!-- AJAX Loaded Categories -->
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Add Products -->
                <div class="col-md-8">
                    <div class="card shadow-sm p-4">
                        <h3 class="mb-4">Add Product</h3>

                        <form action="addproduct" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Product Category</label>
                                <select class="form-select" name="category" required="">
                                    <option value="">--Select--</option>
                                    @foreach($categorydata as $category)
                                        <option name="category" value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Write a title"
                                    required="">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="image" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Description</label>
                                <textarea class="form-control" rows="3" name="description" required=""></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Product Price</label>
                                <input type="number" class="form-control" name="price" required="">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Add Product</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>





    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>