<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
use App\Policies\BookCategoryPolicy;
use App\Policies\BookPolicy;
use App\Policies\EmployeePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Book::class => BookPolicy::class,
        BookCategory::class => BookCategoryPolicy::class,
        User::class => EmployeePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-book', [BookPolicy::class, 'create']);
        Gate::define('update-book', [BookPolicy::class, 'update']);
        Gate::define('delete-book', [BookPolicy::class, 'delete']);

        Gate::define('create-category', [BookCategoryPolicy::class, 'create']);
        Gate::define('update-category', [BookCategoryPolicy::class, 'update']);
        Gate::define('delete-category', [BookCategoryPolicy::class, 'delete']);

        Gate::define('view-employee', [EmployeePolicy::class, 'view']);
        Gate::define('create-employee', [EmployeePolicy::class, 'create']);
        Gate::define('store-employee', [EmployeePolicy::class, 'store']);
        Gate::define('update-employee', [EmployeePolicy::class, 'update']);
        Gate::define('delete-employee', [EmployeePolicy::class, 'delete']);
    }
}
