<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
  <link rel="stylesheet" href="{{asset('public/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
  <link rel="shortcut icon" href="{{asset('public/images/favicon.html')}}" />
</head>
<body class="sidebar-dark">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages" style="background: #001158">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>

              <p class="alert-danger">
                <?php 
                    $exception = Session::get('exception');
                    if ($exception) {
                          echo $exception;
                          Session::put('exception',null);
                    }
                ?>
              </p>

              <form method="post" action="{{url('/adminlogin')}}">
                @csrf
                <div class="form-group">
                  <label>Username or email *</label>
                  <input type="text" class="form-control p_input" name="admin_email" placeholder="email" required="">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" class="form-control p_input" name="admin_password" placeholder="password" autocomplete="off">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="icheck-square">
                    <input tabindex="1" type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <small class="text-center d-block">Don't have an Account?<a href=""> Sign Up</a></small>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('public/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('public/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('public/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('public/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('public/js/off-canvas.js')}}"></script>
  <script src="{{asset('public/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('public/js/misc.js')}}"></script>
  <script src="{{asset('public/js/settings.js')}}"></script>
</body>
</html>
