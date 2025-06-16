<?php

// app/Http/Controllers/EmployeeController.php
// This controller handles all CRUD operations for the Employee resource via API routes.
// It uses Laravel's Eloquent ORM for database interactions and request validation for data integrity.

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // GET /api/employees
    // Returns a list of all employees as JSON.
    public function index()
    {
        return Employee::all();
    }

    // POST /api/employees
    // Validates and creates a new employee record, then returns the created employee as JSON.
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'system_working_on' => 'required|string|max:255',
        ]);

        // Create and return the new employee
        $employee = Employee::create($validated);
        return response()->json($employee, 201);
    }

    // GET /api/employees/{id}
    // Returns a single employee by ID, or 404 if not found.
    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    // PUT/PATCH /api/employees/{id}
    // Validates and updates an existing employee, then returns the updated employee as JSON.
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        // Validate only the fields present in the request
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'position' => 'sometimes|required|string|max:255',
            'system_working_on' => 'sometimes|required|string|max:255',
        ]);

        $employee->update($validated);
        return response()->json($employee);
    }

    // DELETE /api/employees/{id}
    // Deletes an employee by ID and returns a 204 No Content response.
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json(null, 204);
    }
}
