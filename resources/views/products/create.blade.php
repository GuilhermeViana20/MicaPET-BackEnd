<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Product Form - Laravel 9 CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add Product</h2>
                    </div>
                    <div class="pull-right mb-3">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            @error('name')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>SKU:</strong>
                            <input type="sku" name="sku" class="form-control" placeholder="SKU">
                            @error('sku')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Price:</strong>
                            <input type="text" name="price" class="form-control" placeholder="Price">
                            @error('price')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Image:</strong>
                            <input type="text" name="image" class="form-control" placeholder="Image">
                            @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <textarea type="text" name="description" class="form-control" placeholder="Description"></textarea>
                            @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Promotional Price:</strong>
                            <input type="text" name="promotional_price" onkeypress="$(this).mask('R$ 999.990,00')" class="form-control" placeholder="Promotional Price">
                            @error('promotional_price')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Category:</strong>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>In Promotion:</strong>
                            <select class="form-select" name="in_promotion">
                                <option selected value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-group">
                            <strong>Active:</strong>
                            <select class="form-select" name="active" aria-label="Default select example">
                                <option selected value="1">Active</option>
                                <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </div>
            </form>
    </body>
</html>
