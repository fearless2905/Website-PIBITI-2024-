<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: url('https://img.freepik.com/free-photo/winding-road-cuts-path-through-lush-green-mountains-hazy-sky_91128-4483.jpg?t=st=1721833714~exp=1721837314~hmac=5865d6d60d95cde7b4610ab3a462aa790acfd32e960cbc734c79963c17313d25&w=1380') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .login-card {
            max-width: 360px;
            opacity: 0;
            animation: fadeIn 1s forwards;
            background: rgba(0, 0, 0, 0.6);
            /* Transparan abu-abu */
            color: #fff;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-body {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .fw-bold {
            font-size: 1.5rem;
            color: #fff;
            animation: typing 2s steps(30, end), blink-caret 0.75s step-end infinite;
            white-space: nowrap;
            overflow: hidden;
        }

        .typewriter-text {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid #fff;
            animation: typing 4s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: rgba(255, 255, 255, 0.75);
            }
        }

        .form-label,
        .btn-dark {
            color: #ddd;
        }

        .btn-dark {
            background-color: #333;
            border: none;
        }

        .btn-dark:hover {
            background-color: #555;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .invalid-feedback {
            color: #ff6b6b;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="login-card card">
        <div class="card-body">
            <form action="/login" method="post" novalidate>
                @csrf

                <h4 class="fw-bold">Welcome Hikers!</h4>
                <div class="mb-3">
                    <div class="typewriter-text">Masukkan detail akunmu</div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="Enter your email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password"
                        name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Log In</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
