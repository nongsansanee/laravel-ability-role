<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\OPDCard;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       'App\Models\OPDCard' => 'App\Policies\OPDCardPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user,$ability){
            if($user->abilities->contains($ability)){
                return true;
            }
        });

        // Gate::define('create-case',function(User $user){  //fix 
        //         return $user->email === 'officer@med.si';
        // });

        // Gate::define('create_case',function(User $user){  // check จาก table abilities , roles ,users
        //         return $user->abilities->contains('create_case');
        // });

        // Gate::define('view_any_cases',function(User $user){
        //     return $user->abilities->contains('view_any_cases');
        // });

        // Gate::define('exam',function(User $user, OPDCard $opdcard){
        //         \Log::info('1111');
        //         return $opdcard->triage;
        //         //return flase;
        // });

      
    }
}
