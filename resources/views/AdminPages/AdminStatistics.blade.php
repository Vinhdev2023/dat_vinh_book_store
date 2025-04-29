<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Flot Charts</title>

    @include('IconWeb')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin_plugin/plugins/fontawesome-free/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/admin_plugin/plugins/daterangepicker/daterangepicker.css">
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
                        <h1>Flot Charts</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Flot</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Date picker</h3>
                            </div>
                            <form action="/admin/statistics/get-data" method="post">
                                @csrf
                                <div class="card-body">
                                    <!-- Date range -->
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="FromDateToDate" @if(@isset($dateInput))value="{{$dateInput}}"@endif class="form-control float-right" id="reservation">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            <!-- /.card-body -->
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col">
                        @if($path == '/admin/statistics/data')
                        <!-- Bar chart -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Thống Kê Theo Ngày
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                                        <i class="fas fa-times"></i>--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="bar-chart" style="height: 420px;"></div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer">
                                <h3 class="card-title">
                                    Total: {{number_format($sumTotal)}} VND
                                </h3>
                            </div>
                        </div>
                        <!-- /.card -->
                        @endif
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col">
                    @if($path == '/admin/statistics/data')
                        <!-- Bar chart -->
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Thống Kê Theo Ngày
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="remove">--}}
{{--                                        <i class="fas fa-times"></i>--}}
{{--                                    </button>--}}
                                    </div>
                                </div>
                                <div class="card-body" style="padding-right: 150px; padding-left: 150px">
                                    <div id="line-chart" style="height: 420px;"></div>
                                </div>
                                <!-- /.card-body-->
                                <div class="card-footer">
                                    <h3 class="card-title">
                                        Total: {{number_format($sumTotal)}} VND
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card -->
                        @endif
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
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
<!-- InputMask -->
<script src="/admin_plugin/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="/admin_plugin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- FLOT CHARTS -->
<script src="/admin_plugin/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="/admin_plugin/plugins/flot/plugins/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="/admin_plugin/plugins/flot/plugins/jquery.flot.pie.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin_plugin/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        //Date range picker
        $('#reservation').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            }
        })
        /*
         * BAR CHART
         * ---------
         */
        var total_date = @json($dataDateTotal);
        var date = @json($dataDate);
        var bar_data_date = {
            data : total_date,
            bars: { show: true }
        }
        $.plot('#bar-chart', [bar_data_date], {
            grid  : {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor  : '#f3f3f3',
                margin: {
                    top: 0,
                    bottom: 20,
                    left: 0,
                    right: 0
                }
            },
            series: {
                bars: {
                    show: true, barWidth: 0.5, align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis : {
                ticks: date
            }
        })
        /* END BAR CHART */
        /*
         * LINE CHART
         * ----------
         */
        //LINE randomly generated data

        var sin = @json($dataDateTotal);
        var line_data1 = {
            data : sin,
            color: '#3c8dbc'
        }
        $.plot('#line-chart', [line_data1], {
            grid  : {
                hoverable  : true,
                borderColor: '#f3f3f3',
                borderWidth: 1,
                tickColor  : '#f3f3f3'
            },
            series: {
                shadowSize: 0,
                lines     : {
                    show: true
                },
                points    : {
                    show: true
                }
            },
            lines : {
                fill : false,
                color: ['#3c8dbc', '#f56954']
            },
            yaxis : {
                show: true
            },
            xaxis : {
                show: true
            }
        })
        //Initialize tooltip on hover
        $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
            position: 'absolute',
            display : 'none',
            opacity : 0.8
        }).appendTo('body')
        $('#line-chart').bind('plothover', function (event, pos, item) {
            if (item) {
                $('#line-chart-tooltip').html(sin[item.dataIndex][1] + ' VND in ' + date[item.dataIndex][1])
                    .css({
                        top : item.pageY + 5,
                        left: item.pageX + 5
                    })
                    .fadeIn(200)
            } else {
                $('#line-chart-tooltip').hide()
            }

        })
        /* END LINE CHART */
    })

    /*
     * Custom Label formatter
     * ----------------------
     */
    function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
            + label
            + '<br>'
            + Math.round(series.percent) + '%</div>'
    }
</script>
</body>
</html>
