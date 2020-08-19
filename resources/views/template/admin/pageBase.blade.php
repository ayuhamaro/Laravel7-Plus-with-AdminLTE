<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    @if( ! is_null($___VIEW_CONFIG___['metadata']))
    @include($___VIEW_CONFIG___['metadata'])
    @endif
    <title><?php echo $site_title; ?></title>

    <!-- AdminLTE CSS 開始 -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- AdminLTE CSS 結束 -->

    @include($___VIEW_CONFIG___['common_js'])
    <!--自訂JS-->
    @if( ! is_null($___VIEW_CONFIG___['js']))
    @include($___VIEW_CONFIG___['js'])
    @endif

    @include($___VIEW_CONFIG___['common_css'])
    <!--自訂CSS-->
    @if( ! is_null($___VIEW_CONFIG___['css']))
    @include($___VIEW_CONFIG___['css'])
    @endif

    @if(is_null($error_msg))
    <style type="text/css">
        /* 錯誤訊息專用的的CSS */
        #error_msg_block{
            display: none;
        }
    </style>
    @endif

</head>
<body class="hold-transition <?php echo $layout_options; ?>">
    <!--  頁面主容器 開始 -->
    <div class="wrapper">
        <!--  上選單 開始 -->
        @if( ! is_null($___VIEW_CONFIG___['header']))
        @include($___VIEW_CONFIG___['header'])
        @endif
        <!--  上選單 結束 -->
        <!--  左選單 開始 -->
        @if( ! is_null($___VIEW_CONFIG___['left_side']))
        @include($___VIEW_CONFIG___['left_side'])
        @endif
        <!--  左選單 結束 -->
        <!-- 內容區布局 開始 -->
        <div class="content-wrapper">
            <!--  頁面標題列 開始 -->
            @if( ! is_null($___VIEW_CONFIG___['content_header']))
            @include($___VIEW_CONFIG___['content_header'])
            @endif
            <!--  頁面標題列 結束 -->
            <!--  頁面內容布局 開始 -->
            <section class="content">
                <div class="container-fluid">
                    @include($___VIEW_CONFIG___['error_msg'])
                    @if( ! is_null($___VIEW_CONFIG___['content']))
                    @include($___VIEW_CONFIG___['content'])
                    @endif
                </div>
            </section>
            <!--  頁面內容布局 結束 -->
            <!--  頁面腳註列 開始 -->
            @if( ! is_null($___VIEW_CONFIG___['content_footer']))
            @include($___VIEW_CONFIG___['content_footer'])
            @endif
            <!--  頁面腳註列 結束 -->
        </div>
        <!-- 內容區布局 結束 -->
        <!--  下選單 開始 -->
        @if( ! is_null($___VIEW_CONFIG___['footer']))
        @include($___VIEW_CONFIG___['footer'])
        @endif
        <!--  下選單 結束 -->
        <!--  右選單 開始 -->
        @if( ! is_null($___VIEW_CONFIG___['right_side']))
        @include($___VIEW_CONFIG___['right_side'])
        @endif
        <!--  右選單 結束 -->
    </div>
    <!--  頁面主容器 結束 -->

    <!-- 額外區塊開始 -->
    @include($___VIEW_CONFIG___['extra'])
    <!-- 額外區塊結束 -->

    <!-- AdminLTE JS 開始 -->
    <!-- jQuery -->
    <script src="/assets/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/assets/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/assets/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/assets/AdminLTE-3.0.5/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/assets/AdminLTE-3.0.5/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/assets/AdminLTE-3.0.5/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/assets/AdminLTE-3.0.5/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/assets/AdminLTE-3.0.5/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/assets/AdminLTE-3.0.5/plugins/moment/moment.min.js"></script>
    <script src="/assets/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/assets/AdminLTE-3.0.5/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/assets/AdminLTE-3.0.5/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/assets/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/AdminLTE-3.0.5/dist/js/demo.js"></script>
    <!-- AdminLTE JS 結束 -->

    @include($___VIEW_CONFIG___['common_nle_js'])
    <!--自訂的非阻斷JS-->
    @if( ! is_null($___VIEW_CONFIG___['nle_js']))
    @include($___VIEW_CONFIG___['nle_js'])
    @endif

    @include($___VIEW_CONFIG___['common_nle_css'])
    <!--自訂的非阻斷CSS-->
    @if( ! is_null($___VIEW_CONFIG___['nle_css']))
    @include($___VIEW_CONFIG___['nle_css'])
    @endif

</body>
</html>