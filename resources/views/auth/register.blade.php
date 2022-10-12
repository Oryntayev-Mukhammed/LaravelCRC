<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include('import.boot')
</head>
<style>
    body {
        background: #c7b39b url({{asset('/storage/img/back.jpg')}});
        background-size: cover;
        color: #fff;
    }

    td {
        padding: 30px;
    }

    svg:hover{
        color: #8e8985;
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
<body>
@include('import.navbar')
<div class="container d-flex justify-content-center mt-4 w-75" style="height: 650px; border: 7px solid white; border-radius: 15px; border-color: rgba(108,117,125,0.7); background: rgb(52,58,64, 0.7);">
    <div class="login-form">
        <form action="{{ route('register') }}" method="post" class="bg-secondary" style="border-radius: 20px;">
            @csrf
            <h2 class="text-center">Registration</h2>
            <div class="form-group">
                <input id="email"
                       type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email"
                       placeholder="Email@mail.ru"
                       value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="name"
                       type="text"
                       name="name"
                       class="form-control"
                       placeholder="Name"
                       value="{{ old('name') }}"
                       required autocomplete="name"
                       autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password"
                       name="password"
                       type="password"
                       placeholder="Password"
                       class="form-control @error('password') is-invalid @enderror"
                       required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="password"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Re-password"
                       name="password_confirmation"
                       required autocomplete="new-password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">create</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
