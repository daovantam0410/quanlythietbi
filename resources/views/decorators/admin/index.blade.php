<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <base href="{{asset('')}}">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="admin_asset/assets/css/normalize.css">
    <link rel="stylesheet" href="admin_asset/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin_asset/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin_asset/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="admin_asset/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="admin_asset/assets/scss/style.css">
    <link href="admin_asset/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/search.css">
    <script type="text/javascript" src="admin_asset/ckeditor/ckeditor.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    

</head>
<body>


<!-- Left Panel -->

@include('common.admin.menu')

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
@include('common.admin.header')
<!-- Header-->

    @yield('content')
</div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="admin_asset/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="admin_asset/assets/js/plugins.js"></script>
<script src="admin_asset/assets/js/main.js"></script>


<script src="admin_asset/assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="admin_asset/assets/js/dashboard.js"></script>
<script src="admin_asset/assets/js/widgets.js"></script>
<script src="admin_asset/assets/js/lib/vector-map/jquery.vmap.js"></script>
<script src="admin_asset/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
<script src="admin_asset/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
<script src="admin_asset/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>

<script src="admin_asset/assets/js/lib/data-table/datatables.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/jszip.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="admin_asset/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="admin_asset/assets/js/lib/data-table/datatables-init.js"></script>

<!-- bieu do -->
<div id="anychart-embed-samples-bct-column-chart-01" class="anychart-embed anychart-embed-samples-bct-column-chart-01">
<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-exports.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-ui.min.js?hcode=a0c21fc77e1449cc86299c5faa067dc4"></script>
<div id="ac_style_samples-bct-column-chart-01" style="display:none;">

<script src="admin_asset/assets/js/vender/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
<!-- <script> CKEDITOR.replace('editor1'); </script> -->
@yield('script')
</body>
</html>
