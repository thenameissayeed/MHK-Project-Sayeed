<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <style>
        
        body {
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
            padding: 30px;
            background: linear-gradient(120deg, #f9fafb, #eef2f3);
            color: #111827;
            min-height: 100vh;
        }

        .card {
            max-width: 500px;
            margin: auto;
            border-radius: 12px;
            padding: 25px;
            background: #fff;
            border: 1px solid #e5e7eb;
        }

        .card h2 {
            margin-bottom: 15px;
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            background: linear-gradient(90deg, #2563eb, #0ea5e9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card img {
            max-width: 140px;
            border-radius: 50%;
            margin: 15px auto;
            display: block;
            border: 3px solid #e5e7eb;
        }

        .info {
            margin-top: 15px;
        }

        .info p {
            margin: 10px 0;
            font-size: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #f3f4f6;
        }

        .info strong {
            color: #374151;
        }

        .status-active {
            color: #10b981;
            font-weight: bold;
        }

        .status-inactive {
            color: #ef4444;
            font-weight: bold;
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .back-link a {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .back-link a:hover {
            background: #1e4ed8;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

<div class="card">
    <h2>👤 Employee Details</h2>

    @if($employee->profile_photo)
        <img src="{{ asset('uploads/' . $employee->profile_photo) }}" alt="Profile Photo">
    @else
        <img src="https://via.placeholder.com/150" alt="No Photo">
    @endif

    <div class="info">
        <p><strong>Full Name:</strong> {{ $employee->full_name }}</p>
        <p><strong>Email:</strong> {{ $employee->email }}</p>
        <p><strong>Phone:</strong> {{ $employee->phone_number }}</p>
        <p><strong>Department:</strong> {{ $employee->department }}</p>
        <p><strong>Designation:</strong> {{ $employee->designation }}</p>
        <p><strong>Date of Joining:</strong> {{ $employee->date_of_joining }}</p>
        <p>
            <strong>Status:</strong> 
            @if($employee->status)
                <span class="status-active">✅ Active</span>
            @else
                <span class="status-inactive">❌ Inactive</span>
            @endif
        </p>
    </div>

    <div class="back-link">
        <a href="{{ route('employees.index') }}">← Back to Home</a>
    </div>
</div>

</body>
</html>
