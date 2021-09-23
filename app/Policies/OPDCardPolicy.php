<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\OPDCard;

class OPDCardPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function exam(User $user, OPDCard $opdcard)
    {
        \Log::info('22222');
        return $opdcard->triage;
    }
}
