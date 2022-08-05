<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Laravel 9 CRUD Tutorial Example</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <style>
            .icon-pencil, .icon-trash {
                position: absolute;
                top: 10px;
                font-size: 20px;
                border: solid 2px black;
                padding: 10px 15px;
                border-radius: 20%;
                opacity: 0.5;
                background: black;
                color: white;
            }
            
            .icon-pencil {
                float: right;
                right: 30px;
            }

            .icon-trash {
                float: left;
                left: 30px;
            }

            .icon-pencil:hover {
                background: #007bff;
                opacity: 1;
                border: solid 2px #007bff;
            }

            .icon-trash:hover {
                background: #dc3545;
                opacity: 1;
                border: solid 2px #dc3545;
            }
        </style>
    </head>
    <body>
        <div class="container mt-2">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Laravel 9 CRUD Example Tutorial</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('categories.create') }}"> Create Category</a>
                    </div>
                    @if (isset($categories))
                        <strong>{{ $categories->count() }} categorias</strong>
                    @endif
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th width="280px">Action</th>
                </tr>
                @php
                    $i = 0;
                @endphp
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->active }}</td>
                        {{-- <td>
                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </table>
            {!! $categories->links() !!}
        </div>
    </body>
</html>