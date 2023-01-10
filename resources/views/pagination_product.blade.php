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
