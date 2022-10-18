<?php

namespace App\Providers;

use App\Models\Answer;
use App\Models\Mcq;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Subject;
use App\Policies\SubjectPolicy;
use App\Models\Paper;
use App\Models\RegisterSubject;
use App\Models\Subjective;
use App\Models\TrueFalseQuestion;
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
        // Subject::class => SubjectPolicy::class,
        // Paper::class => PaperPolicy::class,
        // Answer::class => AnswerPolicy::class,
        // RegisterSubject::class => RegisterSubjectPolicy::class,
        // Subjective::class => SubjectivePolicy::class,
        // Subject::class => SubjectPolicy::class,
        // TrueFalseQuestion::class => TrueFalseQuestionPolicy::class,
        // Mcq::class => McqPolicy::class,
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
