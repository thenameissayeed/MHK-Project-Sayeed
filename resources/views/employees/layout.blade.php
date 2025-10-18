
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <title>Employee Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f3f3f3;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 1000px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        input, select, button {
            padding: 8px;
            margin: 6px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        a.button {
            padding: 6px 10px;
            background: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-danger {
            background: #e74c3c;
        }
        .btn-success {
            background: #2ecc71;
        }
        .msg {
            background: #dff0d8;
            color: #3c763d;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>@yield('title')</h1>

        @if(session('success'))
            <div class="msg">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
