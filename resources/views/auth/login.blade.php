<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{!! asset('public/LoginAssets/style.css') !!}" />
    <title>Payrchat - Login & Sign Up</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{ route('login') }}" method="post" class="sign-in-form">
            @csrf
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" name="email" value="{{ old('email') }}" required placeholder="E-Mail" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" required placeholder="Password"/>
            </div>
            <input type="submit" value="Login" class="btn solid" />
            <a href="{{ route('password.request') }}" class="social-text" style="text-decoration: none;color: inherit;">Forget password?</a>
            <div class="social-media">
            </div>
          </form>
          <form action="{{ route('register') }}" method="post" class="sign-up-form">
            @csrf
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="first_name" placeholder="First Name" />
              <input type="hidden" class="input" name="refered_by" value="<?php echo (empty($_GET['refer_id'] )) ? ' ' : $_GET['refer_id']  ?>">
            </div>
            @error ('first_name')
              <small style="color:red">{{ $message }}</small>
            @enderror
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="last_name" placeholder="Last Name" />
            </div>
            @error ('last_name')
              <small style="color:red">{{ $message }}</small>
            @enderror
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" placeholder="E-Mail" />
            </div>
            @error ('email')
              <small style="color:red">{{ $message }}</small>
            @enderror
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  name="password" placeholder="Password" />
            </div>
            @error ('password')
              <small style="color:red">{{ $message }}</small>
            @enderror
            <input type="submit" class="btn" value="Sign up" />

          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>

            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{!! asset('public/LoginAssets/img/log.svg')!!}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{!! asset('public/LoginAssets/img/register.svg') !!}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{!! asset('public/LoginAssets/app.js') !!}"></script>
  </body>
</html>
