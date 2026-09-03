<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Peminjaman Ruangan</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f9;

            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .card {
            background: white;

            padding: 35px;

            border-radius: 12px;

            box-shadow:
                0 4px 15px rgba(0, 0, 0, 0.10);
        }

        .title {
            text-align: center;

            margin-bottom: 30px;
        }

        .title h1 {
            margin: 0 0 8px;

            color: #2563eb;

            font-size: 25px;
        }

        .title p {
            margin: 0;

            color: #777;

            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-bottom: 8px;

            font-weight: bold;

            color: #333;
        }

        input {
            width: 100%;

            padding: 12px;

            border: 1px solid #ccc;

            border-radius: 7px;

            font-size: 14px;
        }

        input:focus {
            outline: none;

            border-color: #2563eb;
        }

        .btn-login {
            width: 100%;

            padding: 12px;

            background: #2563eb;

            color: white;

            border: none;

            border-radius: 7px;

            cursor: pointer;

            font-size: 15px;

            font-weight: bold;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;

            color: #991b1b;

            padding: 12px;

            border-radius: 7px;

            margin-bottom: 20px;

            font-size: 14px;
        }

        .error ul {
            margin: 5px 0 0;
            padding-left: 20px;
        }

        .back {
            text-align: center;

            margin-top: 20px;
        }

        .back a {
            color: #2563eb;

            text-decoration: none;

            font-size: 14px;
        }

    </style>

</head>

<body>

    <div class="login-container">

        <div class="card">

            <div class="title">

                <h1>
                    Sistem Peminjaman Ruangan
                </h1>

                <p>
                    Silakan login untuk melanjutkan
                </p>

            </div>


            @if ($errors->any())

                <div class="error">

                    <strong>
                        Login gagal
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('login') }}"
                method="POST"
            >

                @csrf


                <div class="form-group">

                    <label for="email">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        required
                        autofocus
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Masukkan password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn-login"
                >
                    Login
                </button>

            </form>


            <div class="back">

                <a href="{{ url('/') }}">
                    ← Kembali ke Beranda
                </a>

            </div>

        </div>

    </div>

</body>

</html>