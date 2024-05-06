<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Resume - Signup</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="bg-dark">
    <div class="container min-vh-100 bg-light d-flex flex-column justify-content-center align-items-center">
        <h1 class="display-3 text-center">Get Your Resume Ready!</h1>

        <h1 class="text-center">Signup</h1>
        <form action="/signup" class="col-10 col-sm-6 mx-auto" method="POST">
            @csrf
            <div class="form-group my-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
                @if($errors->has('name'))
                    <small class="text-danger">
                        {{$errors->first('name')}}
                    </small>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                @if($errors->has('email'))
                    <small class="text-danger">
                        {{$errors->first('email')}}
                    </small>
                @endif
            </div>
            <div class="form-group my-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @if($errors->has('password'))
                    <small class="text-danger">
                        {{$errors->first('password')}}
                    </small>
                @endif
            </div>
            <button class="btn btn-primary w-100">Signup</button>
            <small>Already have an account? <a href="{{url('login')}}" class="link italic">Login</a></small>
        </form>
    </div>

</body>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($message = Session::get('success'))
<script>
Swal.fire(
  'Singup Success',
  '{{ $message }}',
  'success'
)
</script>
@endif
</html>