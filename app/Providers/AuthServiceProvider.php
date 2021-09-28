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

        // Gate::before(function($user,$ability){
        //     \Log::info($user);
        //     \Log::info('ability='.$ability);
        //     \Log::info('------------');
        //     if($user->abilities->contains($ability)){
        //         return true;
        //     }
        // });

        Gate::define('view_any_cases',function(User $user){
            \Log::info('view_any_cases');
            \Log::info('role name='.$user->name);
            //return $user->abilities->contains('view_any_cases');
            // if(strcmp($user->name,'er_md')==0 || strcmp($user->name,'officer')==0)
            return $user->abilities->contains('view_any_cases');
                //return true;
           
        });

        Gate::define('view_er_case',function(User $user, OPDCard $opdcard){
                \Log::info('er case');
                \Log::info('role name='.$user->name);
            if( $opdcard->triage <= 2 
                && $opdcard->triage != 0 
                && strcmp($user->name,'er_md')==0 ) 
                return true;
               
        });

        Gate::define('view_gp_case',function(User $user, OPDCard $opdcard){
            \Log::info('gp case');
            if($opdcard->triage > 2
                && strcmp($user->name,'gp_md')==0)
                return true;
            
        });

        // Gate::define('create-case',function(User $user){  //fix 
        //         return $user->email === 'officer@med.si';
        // });

        Gate::define('create_case',function(User $user){  // check จาก table abilities , roles ,users
                return $user->abilities->contains('create_case');
        });

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
