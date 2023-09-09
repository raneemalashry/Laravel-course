<!DOCTYPE html>
<html lang="en">
    <head>
     @include('layouts.head')
    </head>
    <body>
        <!-- Responsive navbar-->
      @include('layouts.nav')
        <!-- Page header with logo and tagline-->
        <div class="container mt-3"
        @include('dashboard.layouts.notifications')
        @yield('content')
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>        <!-- Core theme JS-->
        <!-- Core theme JS-->
        <script src="{{asset('website_assets/js/scripts.js')}}"></script>
    </body>
</html>
