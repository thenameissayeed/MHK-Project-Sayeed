<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
    <style>
        body {
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            padding: 30px;
            background: linear-gradient(120deg, #f9fafb, #eef2f3);
            color: #111827;
            min-height: 100vh;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(90deg, #2563eb, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }


        form {
            max-width: 650px;
            margin: auto;
            background: #fff;
            padding: 28px;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
        }

        label {
            display: block;
            margin-top: 16px;
            font-weight: 600;
            font-size: 14px;
            color: #374151;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            background: #fff;
            color: #111827;
            transition: border-color 0.2s, background 0.2s;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
            background: #f9fafb;
            outline: none;
        }

        .status-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 14px;
            font-weight: 500;
            color: #374151;
        }

        input[type="checkbox"] {
            transform: scale(1.2);
        }

        .profile-img {
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        button {
            margin-top: 22px;
            background: #f59e0b;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        button:hover {
            background: #d97706;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <h2>✏️ Edit Employee</h2>

    <form method="POST" action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Full Name</label>
        <input type="text" name="full_name" value="{{ $employee->full_name }}" required>

        <label>Email</label>
        <input type="email" name="email" value="{{ $employee->email }}" required>

        <label>Phone</label>
        <input type="text" name="phone_number" value="{{ $employee->phone_number }}" required>

        <label>Department</label>
        <input type="text" name="department" value="{{ $employee->department }}" required>

        <label>Designation</label>
        <input type="text" name="designation" value="{{ $employee->designation }}" required>

        <label>Date of Joining</label>
        <input type="date" name="date_of_joining" value="{{ $employee->date_of_joining }}" required>

        <label>Profile Photo</label>
        @if($employee->profile_photo)
            <img src="{{ asset('uploads/' . $employee->profile_photo) }}" width="80" class="profile-img">
        @endif
        <input type="file" name="profile_photo">

        <label class="status-label">
            <input type="checkbox" name="status" {{ $employee->status ? 'checked' : '' }}> Active
        </label>

        <button type="submit">💾 Update Employee</button>
    </form>

</body>
</html>
