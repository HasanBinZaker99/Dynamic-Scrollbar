<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Orchid Architect's</title>
    <script src=
                "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script>
        $(function() {
            const element = document.getElementById("demoser");
            const tut = document.getElementById("tut");
            console.log(parent);
            //console.log(pageXOffset);
            // const v = window.scrollY;
            // console.log(v);
            var rect = element.getBoundingClientRect();
            console.log(rect.top, rect.right, rect.bottom, rect.left)
            //$(document).scrollTop(react.top);
            $(document).scrollTop(927);
            tut.scrollTop = 927;
            //fixLayoutHeight = 927;
             //element.offsetTop = 927;
            //elementpageYOffset = 927 ;
            //pageYOffset = 242 ;
            // window.addEventListener('scroll',()=>{
            //   let current = '';
            //   console.log(pageOffset.y);
            // });
            // window.scroll({
            //     top: 7500,
            //     left: 0,
            //     behavior: 'smooth'
            // });
        });
    </script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('backend/dist/js/toastr/toastr.min.css')}} ">
    <!-- Icofont Icons-->
    <link rel="stylesheet" href=" {{ asset('backend/plugins/icofont/icofont.min.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <!-- overlayScrollbars -->
{{--    <link rel="stylesheet" href="{{asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">--}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-4.min.css')}} ">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    <style>
        .imgWrap { display: flex; justify-content: center;}
        .imgcontain { position: relative; width: max-content}
        .imgcontain img { display: block; }
        .imgcontain .fa-trash { position: absolute; top:10px; right:10px; }


        /*.os-scrollbar-handle {*/
        /*    !*height: 38.6811%;*!*/
        /*    transform: translate(0px, 237.771px) !important;*/
        /*    !*pointer-events: auto;*!*/
        /*    !*position: absolute;*!*/
        /*}*/

        /*.sidebr{*/
        /*    position:fixed !important;*/
        /*    overflow:auto !important;*/
        /*    height:100%;*/
        /*    z-index:1;*/
        /*}*/
        /*.bb{*/
        /*    height:100%;*/
        /*    overflow-y:scroll !important;*/
        /*    overflow-x:hidden !important;*/
        /*}*/
        .os-scrollbar-handle{
            /*overflow-y: scroll;*/
            /*//overflow-x: hidden;*/
            /*transform: translate(0px,237.771px) !important;*/

        }
        /*.scrollbehavior {*/
        /*    width:900px;*/
        /*    height:500px;*/
        /*    !*overflow-y:400px;*!*/
        /*    overflow-x:400px;*/
        /*    scroll-behavior:smooth;*/
        /*}*/


    </style>
    <!-- New font start-->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/alt/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/dist/css/alt/bootstrap-select.min.css') }}" />

{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">--}}
<!-- New font end-->
    <style>
        #tut{
        /*    scrollbar-color: #CCCCFF #343A40;*/
        /*scrollbar-color: #A3A6A9 #343A40;*/
        /*    scrollbar-border-radius:30px;*/
        }
        #tut::-webkit-scrollbar {
width:10px;
        }
        #tut::-webkit-scrollbar-track{
            /*margin-top: 10px;*/
            /*margin-bottom: 300px;*/
            border-radius:10px;
            background:#343A40;
            box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }
        #tut::-webkit-scrollbar-button {
            width: 50px; //for horizontal scrollbar
        height: 50px; //for vertical scrollbar
        }
        #tut::-webkit-scrollbar-thumb{
            border-radius: 10px;
            /*height:10px;*/
            /*background: linear-gradient(red,yellow);*/
            background:#A3A6A9;
        }
        #tut::-webkit-scrollbar-corner{
            /*border-radius: 10px;*/
            /*background: linear-gradient(red,yellow);*/
            background:#A3A6A9;
        }
        .main-sidebar{
            /*height:97vh !important;*/
        }
        .main-sidebar, .main-sidebar::before{
            /*width: 253px !important;*/
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" id="app">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
@include('master.navbar')
<!-- /.navbar -->
    <!-- Main Sidebar Container -->
@include('master.sidebar')
@yield('content')
<!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
{{--<script src="{{asset('backend/plugins/jquery/jquery.min.js')}}"></script>--}}
<!-- Bootstrap -->
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
{{--<script src="{{asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>--}}
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.js')}}"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>--}}
<script src="{{asset('backend/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{asset('backend/dist/js/toastr/toastr.min.js')}} "></script>
<!-- Alert -->
<script src="{{asset('backend/dist/js/custom.js')}}"></script>
<script src="{{asset('backend/dist/js/sweetalert2.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
{{--<script>--}}
{{--    var sections = document.querySelectorAll("li");--}}

{{--    onscroll = function () {--}}
{{--        var scrollPosition = document.documentElement.scrollTop;--}}

{{--        sections.forEach((li) => {--}}
{{--            if (--}}
{{--                scrollPosition >= li.offsetTop - li.offsetHeight * 0.25 &&--}}
{{--                scrollPosition <--}}
{{--                li.offsetTop + li.offsetHeight - li.offsetHeight * 0.25--}}
{{--            ) {--}}
{{--                var currentId = li.attributes.id.value;--}}
{{--                removeAllActiveClasses();--}}
{{--                addActiveClass(currentId);--}}
{{--            }--}}
{{--        });--}}
{{--    };--}}

{{--    var removeAllActiveClasses = function () {--}}
{{--        document.querySelectorAll("nav a").forEach((el) => {--}}
{{--            el.classList.remove("active");--}}
{{--        });--}}
{{--    };--}}

{{--    var addActiveClass = function (id) {--}}
{{--        // console.log(id);--}}
{{--        var selector = `nav a[href="#${id}"]`;--}}
{{--        document.querySelector(selector).classList.add("active");--}}
{{--    };--}}

{{--    var navLinks = document.querySelectorAll("nav a");--}}

{{--    navLinks.forEach((link) => {--}}
{{--        link.addEventListener("click", (e) => {--}}
{{--            e.preventDefault();--}}
{{--            var currentId = e.target.attributes.href.value;--}}
{{--            var section = document.querySelector(currentId);--}}
{{--            var sectionPos = section.offsetTop;--}}
{{--            // section.scrollIntoView({--}}
{{--            //   behavior: "smooth",--}}
{{--            // });--}}

{{--            window.scroll({--}}
{{--                top: sectionPos,--}}
{{--                behavior: "smooth",--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}


</body>
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
{{--<script src="{{ asset('backend/plugins/dist/js/popper.min.js') }}"></script>--}}
<script src="{{asset('backend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/dist/js/bootstrap-select.min.js')}}"></script>

<script src="{{ mix('js/app.js') }}"></script>

<script>
    $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    $(document).ready(function() {
        // $('.select2').select2();
        $('.search_select_box select').selectpicker();
    });

</script>

{{--<script>--}}
{{--    var navLinks = document.querySelectorAll("nav ul li a");--}}

{{--    navLinks.forEach((link) => {--}}
{{--        link.addEventListener("click", (e) => {--}}
{{--            e.preventDefault();--}}
{{--            var currentId = e.target.attributes.href.value;--}}
{{--            var section = document.querySelector(currentId);--}}
{{--            var sectionPos = section.offsetTop;--}}
{{--            // section.scrollIntoView({--}}
{{--            //   behavior: "smooth",--}}
{{--            // });--}}

{{--            window.scroll({--}}
{{--                top: sectionPos,--}}
{{--                behavior: "smooth",--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
</html>
