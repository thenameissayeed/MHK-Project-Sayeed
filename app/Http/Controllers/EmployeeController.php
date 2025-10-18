<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{

    public function index(Request $request)
{
    $query = Employee::query();

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('full_name', 'like', '%' . $search . '%')
              ->orWhere('email', 'like', '%' . $search . '%')
              ->orWhere('phone_number', 'like', '%' . $search . '%');
        });
    }

    $employees = $query->latest()->get();

    return view('employees.index', compact('employees'));
}

    public function empIndex()
{
    $employees = \App\Models\Employee::latest()->paginate(10);
    $i = ($employees->currentPage() - 1) * $employees->perPage(); 

    return view('employees.empindex', compact('employees', 'i'));
}


    public function create()
    {
        return view('employees.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone_number' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'date_of_joining' => 'required|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]); 

        $employee = new Employee();
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->department = $request->department;
        $employee->designation = $request->designation;
        $employee->date_of_joining = $request->date_of_joining;
        $employee->status = $request->has('status');

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $employee->profile_photo = $filename;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'phone_number' => 'required',
            'department' => 'required',
            'designation' => 'required',
            'date_of_joining' => 'required|date',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->full_name = $request->full_name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->department = $request->department;
        $employee->designation = $request->designation;
        $employee->date_of_joining = $request->date_of_joining;
        $employee->status = $request->has('status');

        if ($request->hasFile('profile_photo')) {
            if ($employee->profile_photo && file_exists(public_path('uploads/' . $employee->profile_photo))) {
                unlink(public_path('uploads/' . $employee->profile_photo));
            }

            $file = $request->file('profile_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $employee->profile_photo = $filename;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

        public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }



    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->profile_photo && file_exists(public_path('uploads/' . $employee->profile_photo))) {
            unlink(public_path('uploads/' . $employee->profile_photo));
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
