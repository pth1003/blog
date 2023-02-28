<!doctype html>
<html lang="en">
<body style="background-color: #f2f2f2">
@include('frontend.layout.link')
<div class="main">
    @include('frontend.layout.header')
    @yield('content')
    @include('frontend.layout.footer')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
