<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        if (! Gate::allows('view-employee') ) {
            abort(403);
        }

        $users = User::whereHas('roles.role', function ($query) {
            $query->where('name', 'employee');
        })->get();

        return view('employees.index', [
            'employees' => $users,
        ]);
    }

    public function create(): View
    {
        if (! Gate::allows('create-employee') ) {
            abort(403);
        }

        return view('employees.create');
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        if (! Gate::allows('create-employee') ) {
            abort(403);
        }

        $validated = $request->validated();

        $employee = new User();
        $employee->fill($validated)->save();

        $role = Role::where('name', 'employee')->first();
        $employee->roles()->create([
            'role_id' => $role->id,
        ]);

        return redirect(route('employees.index'));
    }

    public function edit(User $employee): View
    {
        if (! Gate::allows('update-employee', $employee) ) {
            abort(403);
        }

        return view('employees.edit', [
            'employee' => $employee,
        ]);
    }

    public function update(EmployeeRequest $request, User $employee): RedirectResponse
    {
        if (! Gate::allows('update-employee', $employee) ) {
            abort(403);
        }

        $validated = $request->validated();
        $employee->update($validated);

        return redirect(route('employees.index'));
    }

    public function destroy(User $employee): RedirectResponse
    {
        if (! Gate::allows('delete-employee', $employee) ) {
            abort(403);
        }

        $employee->delete();
        return redirect(route('employees.index'));
    }
}
