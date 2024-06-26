<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | E-commerce</title>

    @include('IconWeb')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin_plugin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin_plugin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @include('AdminPages.AdminTaskbar.Preloader')
    <!-- Navbar -->
    @include('AdminPages.AdminTaskbar.Navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('AdminPages.AdminTaskbar.MainSidebarContainer')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{$book->title}} Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{$book->title}} Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                            <div class="col-12">
                                <img src="/images/{{$book->image}}" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3">{{$book->title}}</h3>

                            <hr>
                            <h4>Publisher</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                    {{$book->publisher_name}}
                                </label>
                            </div>

                            <h4 class="mt-3">Category</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                    {{$book->category_name}}
                                </label>
                            </div>

                            <h4 class="mt-3">Quantity</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_c1" autocomplete="off">
                                    {{$book->quantity}}
                                </label>
                            </div>

                            <h4 class="mt-3">ISBN CODE</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_c1" autocomplete="off">
                                    {{$book->isbn_code}}
                                </label>
                            </div>

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0">
                                    {{number_format($book->price)}}VND
                                </h2>
                            </div>

                            <div class="mt-4">
                                @if($path == '/admin/product-to-cart/' || $path == '/admin/product-in-cart/')
                                    <form action="@if($path == '/admin/product-in-cart/')/admin/update-cart/{{$book->id}}@else/admin/add-to-cart/{{$book->id}}@endif" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" id="quantity"  min="1" value="@if(@isset($cart_quantity)){{$cart_quantity}}@else{{'1'}}@endif" name="quantity" class="form-control" placeholder="Quantity ...">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">@if($path == '/admin/product-in-cart/'){{'Update cart'}}@else{{'Add Cart'}}@endif</button>
                                        </div>
                                    </form>
                                @elseif($book->status == 0)
                                    <a href="/admin/product/edit-form/{{$book->id}}">
                                        <div class="btn btn-primary btn-lg btn-flat">
                                            Edit
                                        </div>
                                    </a>
                                    <a href="/admin/product/delete/{{$book->id}}" onclick="return confirm('are you sure')">
                                        <div class="btn btn-danger btn-lg btn-flat">
                                            Delete
                                        </div>
                                    </a>
                                    <a href="/admin/product-to-cart/{{$book->id}}">
                                        <div class="btn btn-default btn-lg btn-flat">
                                            <i class="nav-icon fas fa-shopping-cart"></i>
                                            Add to cart
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                                {{$book->description}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('AdminPages.AdminTaskbar.Footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/admin_plugin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin_plugin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin_plugin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin_plugin/dist/js/demo.js"></script>
<script>
    $(function () {
        $('#quantity').on('input', function() {
            $(this).val($(this).val().replace(/[e\+\-]/gi, ''));
        })
    })
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
</body>
</html>
