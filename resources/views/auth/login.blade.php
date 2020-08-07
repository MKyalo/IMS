@extends('layouts.auth.auth')

@section('content')
 

    

<body class="hold-transition login-page">
  <script>
        particlesJS.load("particles-js","{{ asset('public/js/particles.json') }}");
    </script>
  
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Inventory</b>Management</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log in </p>

      <form action="{{ route('login') }}" method="post">
      @csrf
        <div class="input-group mb-3"> 
          <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
          
                               
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
          
                          
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

                                 @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

 

      <p class="mb-1">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">I forgot my password</a>
        @endif
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>

</body>

@endsection
