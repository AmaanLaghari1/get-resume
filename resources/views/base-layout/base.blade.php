@include("base-layout.header")
@yield('main')

</body>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/sweetalert.js')}}"></script>
@stack('script')

</html>