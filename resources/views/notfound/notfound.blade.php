@extends('layouts.master')
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">FITUR BELUM DIBUAT</p>
                <a href="index.html" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">kembali ke menu utama</a>
            </div>
            <footer class="footer text-center"> 2020 &copy; Pixel Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a> </footer>
        </div>
    </section>
    <!-- jQuery -->
    <script type="text/javascript">
        $(function () {
            $(".preloader").fadeOut();
        });
    </script>
@endsection