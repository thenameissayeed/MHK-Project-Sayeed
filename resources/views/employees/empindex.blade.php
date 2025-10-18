@extends('employees.layout')

@section('title', 'Employee List (View Only)')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }
    
    h2 {
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    .container {
        margin-top: 30px;
    }

    .alert {
        padding: 15px;
        border-radius: 5px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.05);
        border-radius: 10px;
        overflow: hidden;
    }

    th, td {
        text-align: center;
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #0d6efd;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 14px;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a, .pagination span {
        margin: 0 5px;
        padding: 8px 12px;
        border-radius: 5px;
        color: #0d6efd;
        text-decoration: none;
        border: 1px solid #0d6efd;
    }

    .pagination .active span {
        background-color: #0d6efd;
        color: white;
    }

    @media (max-width: 768px) {
        table {
            font-size: 13px;
        }

        th, td {
            padding: 8px;
        }
    }
</style>

<div class="container">
    
    <div class="row mb-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Employee List (View Only)</h2>
            {{-- No Add New button here --}}
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Mobile</th>
            <!-- <th>Action</th> -->
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->address }}</td>
            <td>{{ $employee->mobile }}</td>
            <!-- <td>
                <a class="btn btn-primary" href="{{ route('employees.show', $employee->id) }}">View</a>
            </td> -->
        </tr>
        @endforeach
    </table>

    <div class="pagination">
        {!! $employees->links() !!}
    </div>
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
</div>
@endsection
