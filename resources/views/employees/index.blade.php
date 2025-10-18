<!DOCTYPE html>
<html>
<head>
    <title>Employee Management System</title>
    <style>

        body {
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            padding: 30px;
            background: linear-gradient(120deg, #f9fafb, #eef2f3);
            color: #111827;
            min-height: 100vh;
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
            margin-bottom: 35px;
            font-size: 38px;
            font-weight: 700;
            background: linear-gradient(90deg, #2563eb, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        form {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            width: 260px;
            outline: none;
            background: #fff;
            color: #111827;
            font-size: 14px;
            transition: border-color 0.2s, background 0.2s;
        }

        input[type="text"]:focus {
            border-color: #2563eb;
            background: #f9fafb;
        }

        button, a.add-btn, a.action-btn, .delete-btn {
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background 0.2s;
        }

        button {
            background: #2563eb;
            color: #fff;
        }
        button:hover { background: #1e4ed8; }

        a.add-btn {
            background: #10b981;
            color: white;
            display: inline-block;
        }
        a.add-btn:hover { background: #059669; }

        a.action-btn {
            background: #0ea5e9;
            color: white;
        }
        a.action-btn:hover { background: #0284c7; }

        .delete-btn {
            background: #ef4444;
            color: white;
        }
        .delete-btn:hover { background: #dc2626; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: white;
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
        }

        th {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            background: #f3f4f6;
        }

        tr {
            border-bottom: 1px solid #e5e7eb;
        }

        tr:last-child {
            border-bottom: none;
        }

        tr:hover td {
            background: #f9fafb;
        }

        img {
            border-radius: 50%;
        }

        p.success-message {
            text-align: center;
            color: #10b981;
            font-weight: 600;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>SMG</h1>
    <h2>Employee List</h2>

    <div>
        <form method="GET" action="{{ route('employees.index') }}">
            <input type="text" name="search" placeholder="Search by name, email or phone" value="{{ request('search') }}">
            <button type="submit">Search</button>
            <a href="{{ route('employees.index') }}" class="action-btn">Reset</a>
        </form>
    </div>

    <div style="text-align: right; margin-bottom: 15px;">
        <a href="{{ route('employees.create') }}" class="add-btn">+ Add New</a>
    </div>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <table>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach($employees as $employee)
        <tr>
            <td>
                @if($employee->profile_photo)
                    <img src="{{ asset('uploads/' . $employee->profile_photo) }}" width="40">
                @else
                    N/A
                @endif
            </td>
            <td>{{ $employee->full_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->status ? '✅ Active' : '❌ Inactive' }}</td>
            <td>
                <a class="action-btn" href="{{ route('employees.show', $employee->id) }}">View</a>
                <a class="action-btn" style="background: #f59e0b;" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
<footer>
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('login') }}" style="
            display: inline-block;
            padding: 10px 18px;
            background-color: #2563eb;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
        " 
        onmouseover="this.style.background='#1e4ed8';" 
        onmouseout="this.style.background='#2563eb';">
            ← Back to Login
        </a>
    </div>
</footer>
</html>
