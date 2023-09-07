<!DOCTYPE html>
<html lang="en">
    <head>
        @include('dashboard.layouts.head')

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
          @include('dashboard.layouts.sidebar')
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                @include('dashboard.layouts.navbar')
                @include('dashboard.layouts.notifications')

                    @yield('content')
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>        <!-- Core theme JS-->
        <!-- Core theme JS-->
        <script src="{{asset('dashboard_assets/js/scripts.js')}}"></script>
        @stack('scripts')
    </body>
</html>
