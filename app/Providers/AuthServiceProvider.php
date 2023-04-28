<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Book;
use App\Models\BookCategory;
use App\Policies\BookCategoryPolicy;
use App\Policies\BookPolicy;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('create-book' , [BookPolicy::class, 'create']);
        Gate::define('update-book', [BookPolicy::class, 'update']);
        Gate::define('delete-book', [BookPolicy::class, 'delete']);

        Gate::define('create-category', [BookCategoryPolicy::class, 'create']);
        Gate::define('update-category', [BookCategoryPolicy::class, 'update']);
        Gate::define('delete-category', [BookCategoryPolicy::class, 'delete']);
    }
}
