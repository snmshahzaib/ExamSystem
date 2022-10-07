<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Subject;
use App\Policies\SubjectPolicy;
use App\Models\Paper;
use App\Policies\PaperPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Subject::class => SubjectPolicy::class,
        Paper::class => PaperPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isStudent', function($user) {
            return $user->role == 'student';
         });
         Gate::define('isTeacher', function($user) {
            return $user->role == 'teacher';
         });
    }
}
