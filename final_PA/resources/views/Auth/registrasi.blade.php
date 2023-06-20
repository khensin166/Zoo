<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<style>
    .main {
        height: 100vh;
    }

    .register-box {
        width: 500px;
        height: 400px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>

<body>
    <div class="main d-flex justify-content-center align-items-center">
        <div class="register-box p-5 shadow">
            <form action="{{ route('register.submit') }}" method="post">
                @csrf
                <h3 class="mb-4">Registrasi</h3>
                <div>
                    <label for="name">Nama Lengkap: </label>
                    <input type="text" class="form-control" name="name" id="name" required value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" required value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password">Kata Sandi: </label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="confirm-password">Konfirmasi Kata Sandi: </label>
                    <input type="password" class="form-control" name="password_confirmation" id="confirm-password" required>
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit">Daftar</button>
                </div>
                <div class="d-flex justify-content-center">
                <p>
                    Sudah memiliki akun?
                    <strong role="button" tabindex="0"> <a href="{{ route('login') }}">Login</a></strong>
                </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
