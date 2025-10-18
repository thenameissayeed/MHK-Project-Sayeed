<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            text-align: center;
            font-family: 'Abril Fatface';
            margin-bottom: 35px;
            font-size: 100px;
            font-weight: 1500;
            background: linear-gradient(90deg, #081838ff, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #0d6efd;
        }

        .radio-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .radio-group label {
            font-weight: 400;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .alert {
            background-color: #f8d7da;
            color: #842029;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .success {
            background-color: #d1e7dd;
            color: #0f5132;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>SMG</h1>
        <h2>Login</h2>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Display Success Message --}}
        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label>Login As:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="role" value="admin" checked> Admin
                    </label>
                    <label>
                        <input type="radio" name="role" value="employee"> Employee
                    </label>
                </div>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>
