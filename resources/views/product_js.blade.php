<script src="{{asset('/')}}front/assets/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="{{asset('/')}}front/assets/js/jquery-3.6.0.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function () {
        $(document).on('click', '.add_product', function (e) {
            e.preventDefault();
            let name = $('#name').val();
            let price = $('#price').val();
            // console.log(name+price);
            $.ajax({
                url:"{{ route('add.product') }}",
                method: 'POST',
                data: {name:name, price:price},
                success:function (res) {
                    if (res.status == 'success')
                    {
                        $('#addModal').modal(' ');
                        $('#addProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("Product Added", "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },error:function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                    });
                }
            });
        })

        //show product value in update form

        $(document).on('click', '.update_product_form', function () {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let price = $(this).data('price');

                $('#up_id').val(id);
                $('#up_name').val(name);
                $('#up_price').val(price);
        });

        //update product value

        $(document).on('click', '.update_product', function (u) {
            u.preventDefault();
            let up_id = $('#up_id').val();
            let up_name = $('#up_name').val();
            let up_price = $('#up_price').val();
            $.ajax({
                url:"{{ route('update.product') }}",
                method: 'POST',
                data: {up_id:up_id, up_name:up_name, up_price:up_price},
                success:function (res) {
                    if (res.status == 'success')
                    {
                        $('#updateModal').modal('hide');
                        $('#updateProductForm')[0].reset();
                        $('.table').load(location.href+' .table');
                        Command: toastr["success"]("Product Updated", "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": true,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                },error:function (err) {
                    let error = err.responseJSON;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>')
                    });
                }
            });
        })
        // delete product data
        $(document).on('click', '.delete_product', function (u) {
            u.preventDefault();
            let product_id = $(this).data('id');

            if (confirm('Are You Sure Delete Product?'))
            {
                $.ajax({
                    url:"{{ route('delete.product') }}",
                    method: 'POST',
                    data: {product_id:product_id},
                    success:function (res) {
                        if (res.status == 'success')
                        {
                            $('.table').load(location.href+' .table');
                            Command: toastr["success"]("Product Deleted", "Success")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": true,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }
                    }
                });
            }
        })

        //Pagination

        $(document).on('click','.pagination a', function (f) {
            f.preventDefault();
            let page = $(this).attr('href').split('page=')[1]
            product(page)
        })

        function product(page) {
            $.ajax({
                url:"{{route('pagination.product')}}?page="+page,
                success:function (res) {
                    $('.table-data').html(res);
                }
            })
        }

        // Search Product

        $(document).on('keyup', function (s) {
            s.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url: "{{route('search.product')}}",
                method:'GET',
                data:{search_string:search_string},
                success:function (res) {
                    $('.table-data').html(res);

                    if (res.status == 'nothing_found')
                    {
                        $('.table-data').html('<span class="text-center text-danger">'+'Nothing Found'+'</span>');
                    }
                }
            })
        })
    });
</script>
