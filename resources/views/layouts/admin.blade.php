<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home -@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/admin/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.min.css">
    {{-- <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('homeAdmin') }}" class="brand-link">
            <img src="/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Aurora</span>
        </a>

        <div class="sidebar">


            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                      <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Sliders
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slider.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Pages
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('page.index') }}" class="nav-link">
                               <p>All</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('page.create') }}" class="nav-link">
                               <p>Add page</p>
                            </a>
                        </li> --}}
                        </ul>
                    </li>

                    {{-- numbers start --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="nav-icon"></i>
                        <p>
                            Numbers
                             <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('number.index') }}" class="nav-link">
                               <p> All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('number.create') }}" class="nav-link">
                               <p>Add</p>
                            </a>
                        </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>
                                Options
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('options.index') }}" class="nav-link">
                                    <p>All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('options.create') }}" class="nav-link">
                                    <p>Add</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                        {{-- blog start --}}

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>
                                Blog
                                 <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('article.index') }}" class="nav-link">
                                   <p>All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('article.create') }}" class="nav-link">
                                   <p>Add</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        {{-- blog end --}}


                        {{-- category start --}}

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon"></i>
                            <p>
                                Product-Category
                                 <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('categoriy.index') }}" class="nav-link">
                                   <p>All</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('categoriy.create') }}" class="nav-link">
                                   <p>Add</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        {{-- category end --}}


                            {{-- dizel start --}}

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon"></i>
                                <p>
                                    Product
                                     <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dizel.index') }}" class="nav-link">
                                       <p>All</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dizel.create') }}" class="nav-link">
                                       <p>Add</p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            {{-- dizel end --}}


                             {{-- our parents start --}}

                             <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon"></i>
                                <p>
                                    Our partners
                                     <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('useful_resource.index') }}" class="nav-link">
                                       <p> All </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('useful_resource.create') }}" class="nav-link">
                                       <p>Add </p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            {{-- our parents end --}}


                              {{-- service start --}}

                              <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon"></i>
                                <p>
                                    Services
                                     <i class="right fas fa-angle-left"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('uslug.index') }}" class="nav-link">
                                       <p> All </p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('uslug.create') }}" class="nav-link">
                                       <p>Add </p>
                                    </a>
                                </li> --}}
                                </ul>
                            </li>
                            {{-- services  end --}}

                    </ul>
            </nav>

        </div>

    </aside>


    <div class="content-wrapper">
        @yield('content')
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="/admin/plugins/jquery/jquery.min.js"></script>
<script src="/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/admin/plugins/chart.js/Chart.min.js"></script>
<script src="/admin/plugins/sparklines/sparkline.js"></script>
<script src="/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/admin/plugins/moment/moment.min.js"></script>
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/admin/dist/js/adminlte.js"></script>
<script src="/admin/dist/js/demo.js"></script>
<script src="/admin/dist/js/pages/dashboard.js"></script>
<script type="text/javascript" src="/admin/dist/js/jquery.colorbox-min.js"></script>
<script src="https://cdn.tiny.cloud/1/ahyykz2cb58v2hls0682bf1wgweqyi38phnp65pwo6zoihe5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
<script src="/admin/admin.js"></script>

</body>
</html>
