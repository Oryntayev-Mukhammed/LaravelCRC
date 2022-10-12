<!DOCTYPE html>
<html>
<head>
    @include('import.boot')
    <title></title>
    <style>
        body {
            background: #c7b39b url({{asset('/storage/img/back.jpg')}});
            background-size: cover;
            color: #fff;
        }
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }
        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 0 0 15px;
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
@include('import.navbar')
@section('content')
<div class="container d-flex justify-content-center mt-4 w-75" style="height: 650px; border: 7px solid white; border-radius: 15px; border-color: rgba(108,117,125,0.7); background: rgb(52,58,64, 0.7);">
    <div class="login-form">
        <form action="{{ route('login') }}" method="post" style="border-radius: 20px; background-color: #6c767e">
            @csrf
            <h2 class="text-center">Log in</h2>
            <div class="form-group">
                <input id="email"
                       type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Email"
                       value="{{ old('email') }}"
                       required="required">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password"
                       type="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Password"
                       required="required">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
            <div class="clearfix">
                <label class="float-left form-check-label ml-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
            </div>
        </form>
        <p class="text-center"><a href="{{ route('register') }}">Create an Account</a></p>
    </div>
</div>
</body>
</html>
