<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $users = User::whereHas('roles.role', function ($query) {
            $query->where('name', 'employee');
        })->get();

        return view('employees.index', [
            'employees' => $users,
        ]);
    }
}
