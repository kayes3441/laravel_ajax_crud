<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ajax Crud</title>
    <link href="{{asset('/')}}front/assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-5 text-center">Laravel 9 Ajax Crud</h2>
                <a href="" class="btn btn-info my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
                <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here">
                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href=""
                                   class="btn btn-sm btn-success update_product_form"
                                   data-bs-toggle="modal"
                                   data-bs-target="#updateModal"
                                   data-id = "{{ $product->id }}"
                                   data-name = "{{ $product->name }}"
                                   data-price = "{{ $product->price }}"
                                >
                                    <i class="la la-edit"></i>
                                </a>
                                <a href=""
                                   class="btn btn-sm btn-danger delete_product"
                                   data-id = "{{ $product->id }}"
                                >
                                    <i class="la la-remove"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
    @include('product_js')
    @include('product_modal')
    @include('update')

    {!! Toastr::message() !!}
</body>
</html>
