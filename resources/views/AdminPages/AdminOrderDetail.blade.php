<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Invoice</title>

    @include('IconWeb')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin_plugin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin_plugin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Preloader -->
    @include('AdminPages.AdminTaskbar.Preloader')
    <!-- Navbar -->
    @include('AdminPages.AdminTaskbar.Navbar')
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
                        <h1>Order Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Order Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                                        <small class="float-right">Date: {{$order->created_at}}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{$order->cus_name}}</strong><br>
                                        Address: {{$order->ship_to_address}}<br>
                                        Phone: {{$order->cus_phone}}<br>
{{--                                        Email: john.doe@example.com--}}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <br>
                                    <b>Order ID:</b> {{$order->id}}<br>
                                    <b>Status:</b> {{$order->status}}<br>
                                    <b>Account:</b> {{$order->customer_id}}
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Serial #</th>
                                            <th>Description</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order_detail as $obj)
                                        <tr>

                                            <td>{{$obj->book_title}}</td>
                                            <td>{{$obj->book_id}}</td>
                                            <td><a href="/admin/product/detail/{{$obj->book_id}}">Description</a></td>
                                            <td>{{$obj->quantity}}</td>
                                            <td>{{number_format($obj->book_price)}}</td>
                                            <td>{{number_format($obj->book_price*$obj->quantity)}}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        {{$order->payment_method}}
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due {{date_format(date_create($order->updated_at), "d/m/Y H:i:s")}}</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Total:</th>
                                                <td>{{number_format($order->total)}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    @if (@isset($user_check_order))
                                        <p class="left m-0">Checked by: {{$user_check_order->name}}</p>
                                    @elseif($order->status != 'PENDING')
                                        <p class="left m-0">Checked by: Customer</p>
                                    @endif
                                    @if ($order->status == 'PENDING')
                                        <a href="/admin/order/update/CANCELED/{{$order->id}}" type="button" class="btn btn-danger float-right">
                                            Cancel
                                        </a>
                                        <a href="/admin/order/update/CONFIRMED/{{$order->id}}" type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                                            Confirm
                                        </a>
                                        @if($order->type == 'offline')
                                            <a href="/admin/order/repair/{{$order->id}}" type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                                Repair
                                            </a>
                                        @endif
                                    @elseif($order->status == 'CONFIRMED' && $order->type == 'online')
                                        <a href="/admin/order/update/SHIPPING/{{$order->id}}" type="button" class="btn btn-warning float-right" style="margin-right: 5px;">
                                            SHIPPING
                                        </a>
                                    @elseif($order->status == 'CONFIRMED' && $order->type == 'offline' || $order->status == 'SHIPPING')
                                        <a href="/admin/order/update/COMPLETED/{{$order->id}}" type="button" class="btn btn-success float-right" style="margin-right: 5px;">
                                            Complete
                                        </a>
                                        @if($order->status == 'SHIPPING')
                                            <a href="/admin/order/update/CANCELED/{{$order->id}}" type="button" class="btn btn-danger float-right">
                                                Cancel
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
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
</body>
</html>

