<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #222;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: 500;
            color: #444;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
        }

        input[type="checkbox"] {
            width: auto;
            margin-top: 8px;
        }

        .status-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }

        button {
            margin-top: 20px;
            background: #28a745;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.3s;
        }

        button:hover {
            background: #1e7e34;
        }
    </style>
</head>
<body>

    <h2>➕ Add New Employee</h2>

    <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Full Name</label>
        <input type="text" name="full_name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Phone</label>
        <input type="text" name="phone_number" required>

        <label>Department</label>
        <input type="text" name="department" required>

        <label>Designation</label>
        <input type="text" name="designation" required>

        <label>Date of Joining</label>
        <input type="date" name="date_of_joining" required>

        <label>Profile Photo</label>
        <input type="file" name="profile_photo">

        <label class="status-label">
            <input type="checkbox" name="status" checked> Active
        </label>

        <button type="submit">💾 Save Employee</button>
    </form>

</body>
</html>
