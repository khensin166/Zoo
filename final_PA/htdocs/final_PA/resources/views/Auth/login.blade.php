<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<style>
    .main {
        height: 100vh;
    }

    .login-box {
        width: 500px;
        height: 300px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>

<body>
    <div class="main d-flex justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="{{ route('login.submit') }}" method="post">
                @csrf
                <h3 class="mb-4">Login</h3>
                <div>
                    <label for="email">Email Anda: </label>
                    <input type="text" class="form-control" name="email" id="email" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" name="password" id="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit">Masuk</button>
                </div>
                <div class="d-flex justify-content-center">
                <p>
                    Belum memiliki akun?
                    <strong role="button" tabindex="0"> <a href="{{ route('register') }}">Register</a></strong>
                </p>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>

</html>
