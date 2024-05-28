@include("base-layout.header")
@yield('main')

@include('sweetalert::alert')
</body>
<script src="{{asset('assets/js/jquery.js')}}"></script>
@stack('script')

</html>