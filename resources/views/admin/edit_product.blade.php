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


        <div class="col-md-8">

            <div class="card shadow-sm p-4">
                <h3 class="mb-4">Update Product</h3>

                <form action="/updateproduct/{{ $product->id }}" method="post" enctype="multipart/form-data">
                    
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Product Category</label>
                        <select class="form-select" name="category" value="{{ $product->category->id }}">
                            <option value="{{ $product->category->id }}" selected="">{{ $product->category->name }}
                            </option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $product->name }}">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Description</label>
                        <textarea class="form-control" rows="3" name="description" >{{ $product->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Product</button>
                </form>
            </div>
        </div>

    </div>
    </div>


    </div>

    @include('admin.assets.script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>